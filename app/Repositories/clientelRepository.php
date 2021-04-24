<?php

namespace App\Repositories;

use App\Models\clientel;
use App\Repositories\BaseRepository;

/**
 * Class clientelRepository
 * @package App\Repositories
 * @version April 23, 2021, 5:41 pm UTC
*/

class clientelRepository extends BaseRepository
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
        return clientel::class;
    }
}
