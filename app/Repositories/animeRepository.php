<?php

namespace App\Repositories;

use App\Models\anime;
use App\Repositories\BaseRepository;

/**
 * Class animeRepository
 * @package App\Repositories
 * @version April 23, 2021, 6:19 pm UTC
*/

class animeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return anime::class;
    }
}
