<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
