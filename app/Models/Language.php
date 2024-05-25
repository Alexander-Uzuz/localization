<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use PHPUnit\TestRunner\TestResult\Collector;

/** 
 * @property string $id
 * @property string $name
 * 
 * @property boolean $active
 * @property boolean $default
 * @property boolean $fallback
 */

class Language extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'name',
        'active',
        'default',
        'fallback',
    ];

    protected $casts = [
        'active' => 'boolean',
        'default' => 'boolean',
        'fallback' => 'boolean',
    ];

    public static function booted(): void
    {
        static::saved(function (self $model) {
            Cache::forget('languages');
        });
    }

    public function getStateText(): string
    {
        $state = [];

        if ($this->active) {
            $state[] = 'active';
        }

        if ($this->default) {
            $state[] = 'default';
        }

        if ($this->fallback) {
            $state[] = 'fallback';
        }

        return implode(', ', $state);
    }

    public static function findDefault(): self|null
    {
        return self::getActive()->firstWhere('default', true);
    }

    public static function findFallback(): self|null
    {
        return self::getActive()->firstWhere('fallback', true);
    }

    public static function getActive(): Collection
    {
        return
            self::query()
            ->where('active', true)
            ->get();
    }

    public static function findActive(string $id): self|null
    {
        return self::getActive()->firstWhere('id', $id);
    }

    public static function routePrefix(): string|null
    {
        $prefix = request()->segment(1);

        $activeLanguages = static::getActive();

        if ($activeLanguages->doesntContain('id', $prefix)) {
            $prefix = null;
        }

        return $prefix;
    }
}
