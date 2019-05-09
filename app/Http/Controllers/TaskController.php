<?php
    /**
     * TaskController
     * authors Hefa
     * date    2019-05-07 15:10
     * version 0.1
     */

    namespace App\Http\Controllers;


    use App\Plug\WuLiuShuku;
    use App\Providers\TaskProvider;

    class TaskController
    {
        private $provider;

        function __construct()
        {
            $this->provider = new TaskProvider();
        }

        public function run(){
            ignore_user_abort(true);
            set_time_limit(0);
            $this->provider->add((new WuLiuShuku)->run());
            $this->provider->run();
        }


    }
