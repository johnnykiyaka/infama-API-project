<?php

namespace App\Repositories;

use App\Models\Passter;
use App\Repositories\BaseRepository;

/**
 * Class PassterRepository
 * @package App\Repositories
 * @version April 23, 2021, 4:41 pm UTC
*/

class PassterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type',
        'created_by'
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
        return Passter::class;
    }
}
