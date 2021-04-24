<?php

namespace App\Repositories;

use App\Models\Comedy;
use App\Repositories\BaseRepository;

/**
 * Class ComedyRepository
 * @package App\Repositories
 * @version April 23, 2021, 5:50 pm UTC
*/

class ComedyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'comedies',
        'comedysStart',
        'comedysEnd'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comedy::class;
    }
}
