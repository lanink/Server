<?php
/**
 * Created by IntelliJ IDEA.
 * User: liamxin
 * Date: 2019/4/22
 * Time: 21:34
 */

namespace App\Service;

use App\Provider\TaskProvider;
class TaskService
{

    private $provider;

    public function __construct()
    {
      $this->provider =  new TaskProvider();
    }

    public function run(){

        // get task


        $this->provider->run();
    }

}