<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Passter
 * @package App\Models
 * @version April 23, 2021, 4:41 pm UTC
 *
 * @property string $name
 * @property string $type
 * @property integer $created_by
 */
class Passter extends Model
{
    use SoftDeletes;

    public $table = 'passters';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'type',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'string',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
