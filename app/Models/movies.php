<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class movies
 * @package App\Models
 * @version April 23, 2021, 5:47 pm UTC
 *
 * @property string $series
 * @property string $movieStart
 * @property string $movieEnds
 */
class movies extends Model
{
    use SoftDeletes;

    public $table = 'movies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'series',
        'movieStart',
        'movieEnds'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'series' => 'string',
        'movieStart' => 'date',
        'movieEnds' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
