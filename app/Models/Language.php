<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
        return self::query()
            ->where('active', true)
            ->where('default', true)
            ->first();
    }

    public static function findFallback(): self|null
    {
        return self::query()
            ->where('active', true)
            ->where('fallback', true)
            ->first();
    }

    public static function getActive(): Collection
    {
        return self::query()
            ->where('active', true)
            ->get();
    }

    public static function findActive(string $id): self|null
    {
        return self::query()
            ->where('active', true)
            ->where('id', $id)
            ->first();
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
