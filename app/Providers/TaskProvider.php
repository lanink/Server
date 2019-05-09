<?php
    /**
     * TaskProvider  TODO
     * authors Hefa
     * date    2019-05-07 15:15
     * version 0.1 TODO
     */

    namespace App\Providers;


    use Laravel\Lumen\Bootstrap\LoadEnvironmentVariables;

    class TaskProvider
    {
        private $switch;

        private $interval;

        private $task = [];

        public function setSwitch($switch)
        {
            $this->switch = $switch;
        }

        public function setInterval($interval)
        {
            $this->interval = $interval;
        }

        public function getSwitch()
        {
            return $this->switch;
        }


        public function getInterval()
        {
            return $this->interval;
        }


        public function add(\Closure $closure)
        {

            if (!in_array($closure, $this->task)) {
                $this->task[count($this->task)] = $closure;
            }

            return count($this->task);
        }


        public function remove($key)
        {
            if ($this->task[$key]) {
                unset($this->task[$key]);
            }
        }


        public function run()
        {
            $i = 0;

            for (;$i < 1;){
                $this->refreshPropety();

                if (!$this->switch){
                    break;
                }

                foreach ($this->task as $closure) {
                    $closure();
                }

                sleep($this->interval);

                $i++;
            }
        }


        private function refreshPropety()
        {
            (new LoadEnvironmentVariables(
                dirname(__DIR__)
            ))->bootstrap();

            if (!isset($_ENV['TASK_SWITCH'])) {
                $switch = false;
            } else{
                $switch = $_ENV['TASK_SWITCH'] == 1 ? true : false ;
            }

            $this->setSwitch($switch);

            $this->setInterval(intval($_ENV['TASK_TIME'] ?? 0));

        }
    }
