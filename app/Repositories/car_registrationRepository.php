<?php

namespace App\Repositories;

use App\Models\car_registration;
use App\Repositories\BaseRepository;

class car_registrationRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'driver_name',
        'cell_phone',
        'email',
        'district',
        'dan_name',
        'position',
        'relation',
        'car_number'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return car_registration::class;
    }
}
