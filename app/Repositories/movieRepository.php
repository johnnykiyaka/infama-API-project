<?php

namespace App\Repositories;

use App\Models\movie;
use App\Repositories\BaseRepository;

/**
 * Class movieRepository
 * @package App\Repositories
 * @version April 23, 2021, 3:10 pm UTC
*/

class movieRepository extends BaseRepository
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
        return movie::class;
    }
}
