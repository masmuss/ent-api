<?php

namespace App\Services\Member;

use LaravelEasyRepository\Service;
use App\Repositories\Member\MemberRepository;

class MemberServiceImplement extends Service implements MemberService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(MemberRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
