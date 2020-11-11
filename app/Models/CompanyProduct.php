<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyProduct
 * @package App\Models
 */
class CompanyProduct extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'price' => 'float',
    ];
}
