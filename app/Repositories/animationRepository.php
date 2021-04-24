<?php

namespace App\Repositories;

use App\Models\animation;
use App\Repositories\BaseRepository;

/**
 * Class animationRepository
 * @package App\Repositories
 * @version April 23, 2021, 6:03 pm UTC
*/

class animationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'starts',
        'ends'
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
        return animation::class;
    }
}
