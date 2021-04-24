<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class customer
 * @package App\Models
 * @version April 23, 2021, 3:08 pm UTC
 *
 * @property string $movie
 * @property string $movielength
 * @property string $arrival
 */
class customer extends Model
{
    use SoftDeletes;

    public $table = 'customers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'movie',
        'movielength',
        'arrival'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'movie' => 'string',
        'movielength' => 'date',
        'arrival' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
