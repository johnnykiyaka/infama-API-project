<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comedy
 * @package App\Models
 * @version April 23, 2021, 5:50 pm UTC
 *
 * @property string $comedies
 * @property string $comedysStart
 * @property string $comedysEnd
 */
class Comedy extends Model
{
    use SoftDeletes;

    public $table = 'comedies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'comedies',
        'comedysStart',
        'comedysEnd'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'comedies' => 'string',
        'comedysStart' => 'date',
        'comedysEnd' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
