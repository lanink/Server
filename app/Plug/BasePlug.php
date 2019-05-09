<?php

namespace App\Plug;

/**
 * 插件规范
 */
abstract class BasePlug
{
    abstract function run() : \Closure ;
}
