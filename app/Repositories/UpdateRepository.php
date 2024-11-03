<?php

namespace App\Repositories;

use App\Models\Update;
use App\Repositories\BaseRepository;

class UpdateRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'body'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Update::class;
    }
}
