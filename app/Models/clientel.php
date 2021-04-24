<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class clientel
 * @package App\Models
 * @version April 23, 2021, 5:41 pm UTC
 *
 * @property string $movieType
 * @property string $start
 * @property string $Ends
 */
class clientel extends Model
{
    use SoftDeletes;

    public $table = 'clientels';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'movieType',
        'start',
        'Ends'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'movieType' => 'string',
        'start' => 'date',
        'Ends' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
