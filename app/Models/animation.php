<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class animation
 * @package App\Models
 * @version April 23, 2021, 6:03 pm UTC
 *
 * @property string $type
 * @property string $starts
 * @property string $ends
 */
class animation extends Model
{
    use SoftDeletes;

    public $table = 'animations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'starts',
        'ends'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'starts' => 'date',
        'ends' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
