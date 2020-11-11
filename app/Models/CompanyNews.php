<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyProduct
 * @package App\Models
 */
class CompanyNews extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'content' => 'string',
    ];
}
