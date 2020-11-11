<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * @package App\Models
 */
class Employee extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'user_id' => 'int',
    ];
}
