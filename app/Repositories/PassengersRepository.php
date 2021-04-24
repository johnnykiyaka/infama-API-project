<?php

namespace App\Repositories;

use App\Models\Passengers;
use App\Repositories\BaseRepository;

/**
 * Class PassengersRepository
 * @package App\Repositories
 * @version April 23, 2021, 3:05 pm UTC
*/

class PassengersRepository extends BaseRepository
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
        return Passengers::class;
    }
}
