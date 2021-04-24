<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Passenger
 * @package App\Models
 * @version April 23, 2021, 2:58 pm UTC
 *
 * @property string $movie
 * @property string $start
 * @property string $landing
 */
class Passenger extends Model
{
    use SoftDeletes;

    public $table = 'passengers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'movie',
        'start',
        'landing'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'movie' => 'string',
        'start' => 'date',
        'landing' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
