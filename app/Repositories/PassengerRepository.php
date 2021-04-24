<?php

namespace App\Repositories;

use App\Models\Passenger;
use App\Repositories\BaseRepository;

/**
 * Class PassengerRepository
 * @package App\Repositories
 * @version April 23, 2021, 2:58 pm UTC
*/

class PassengerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'movie',
        'start',
        'landing'
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
        return Passenger::class;
    }
}
