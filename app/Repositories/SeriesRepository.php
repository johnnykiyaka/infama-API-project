<?php

namespace App\Repositories;

use App\Models\Series;
use App\Repositories\BaseRepository;

/**
 * Class SeriesRepository
 * @package App\Repositories
 * @version April 23, 2021, 5:39 pm UTC
*/

class SeriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'movieType',
        'start',
        'Ends'
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
        return Series::class;
    }
}
