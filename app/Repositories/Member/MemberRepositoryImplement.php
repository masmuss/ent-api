<?php

namespace App\Repositories\Member;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Member;

class MemberRepositoryImplement extends Eloquent implements MemberRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Member $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
