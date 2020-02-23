<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Import
 * @package App\Entities
 */
class Import extends Model
{
    /**
     * Fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content'
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';
}
