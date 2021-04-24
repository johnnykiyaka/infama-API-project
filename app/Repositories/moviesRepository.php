<?php

namespace App\Repositories;

use App\Models\movies;
use App\Repositories\BaseRepository;

/**
 * Class moviesRepository
 * @package App\Repositories
 * @version April 23, 2021, 5:47 pm UTC
*/

class moviesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'series',
        'movieStart',
        'movieEnds'
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
        return movies::class;
    }
}
