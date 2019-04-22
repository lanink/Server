<?php

namespace App\Controller;

/**
 * 
 * @authors 还不如一只猪威威 (liamxin@yeah.net)
 * @date    2019-04-22 20:10:05
 * @version $Id$
 */
use App\Service\TaskService;
class TaskCtl {

    private $server;

    function __construct()
    {
        $this->server = new TaskService();
    }

    public function run(){
        ignore_user_abort(true);
        set_time_limit(0);
        $this->server->run();
    }




}