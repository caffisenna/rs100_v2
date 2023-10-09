<?php

namespace App\Repositories;

use App\Models\addUsers;
use App\Repositories\BaseRepository;

class addUsersRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'role',
        'district',
        'password'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return addUsers::class;
    }
}
