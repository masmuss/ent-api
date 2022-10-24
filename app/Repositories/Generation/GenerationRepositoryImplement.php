<?php

namespace App\Repositories\Generation;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Generation;

class GenerationRepositoryImplement extends Eloquent implements GenerationRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Generation $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
