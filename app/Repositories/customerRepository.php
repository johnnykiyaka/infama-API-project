<?php

namespace App\Repositories;

use App\Models\customer;
use App\Repositories\BaseRepository;

/**
 * Class customerRepository
 * @package App\Repositories
 * @version April 23, 2021, 3:08 pm UTC
*/

class customerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'movie',
        'movielength',
        'arrival'
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
        return customer::class;
    }
}
