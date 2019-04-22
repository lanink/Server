<?php
/**
 * Created by IntelliJ IDEA.
 * User: liamxin
 * Date: 2019/4/22
 * Time: 20:28
 */
namespace App\Provider;


class TaskProvider
{

    private $switch;

    private $interval;

    public function setSwitch($switch)
    {
        $this->switch = $switch;
    }

    public function setInterval($interval)
    {
        $this->interval = $interval;
    }

    public function getFlag()
    {
        return $this->flag;
    }


    public function getInterval()
    {
        return $this->interval;
    }

    public function run()
    {
        while (true){

            $this->refreshPropety();

            if (!$this->switch)
                return;

            $this->task();

            sleep($this->interval);

        }
    }

    private function task(){
        // TODO
    }


    private function refreshPropety()
    {

       $this->setSwitch(boolval($_ENV['TASK_SWITCH'] ?? false));

       $this->setInterval(intval($_ENV['TASK_TIME'] ?? 0));

    }



}