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
}
