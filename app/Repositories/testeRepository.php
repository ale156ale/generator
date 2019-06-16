<?php

namespace App\Repositories;

use App\Models\teste;
use App\Repositories\BaseRepository;

/**
 * Class testeRepository
 * @package App\Repositories
 * @version June 16, 2019, 1:06 pm UTC
*/

class testeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'endereco'
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
        return teste::class;
    }
}
