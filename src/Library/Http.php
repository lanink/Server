<?php

namespace App\Library;

/**
 * 
 * @authors 还不如一只猪威威 (liamxin@yeah.net)
 * @date    2019-04-12 21:32:34
 * @version $Id$
 */

class Http {
    
    private $host;

    private $path;

    private $timeout = 5;

    private $ajax = false;

    public function __construct()
    {

        //TODO 检测curl是否开启

    }

    //设置主键

    public function setHost($host)
    {

        $this->host = $host;

        return $this;

    }

    //设置路径

    public function setPath($path)
    {

        $this->path = $path;

        return $this;

    }

    public function setAjax($ajax)
    {

        $this->ajax = $ajax;

        return $this;

    }

    /**

     * curl post方式 请求数据

     *

     * @param  array  $data  url传递的参数

     */

    public function post($data, $flag = false)
    {

        $post = '';

        if ($flag == false) {

            foreach ($data as $key => $value) {

                $first = '';

                if ($post != '') {

                    $first = '&';

                }

                $post .= $first . $key . '=' . $value;

            }

        } else {

            $post = $data;

        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->host . $this->path);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        if ($this->ajax) {

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Content-Length: ' . strlen($post)));

        }

        // 是否启用代理

        if (defined('PROXY') && PROXY) {

            curl_setopt($ch, CURLOPT_PROXY, PROXY_HOST . ':' . PROXY_PORT);

        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {

            return false;

        }

        curl_close($ch);

        //返回数据

        return $response;

    }

    /**

     * curl get方式 请求数据

     *

     * @param  array  $data  url传递的参数

     */

    public function get($data = array())
    {

        $url = $this->host . $this->path;

        $suffix = '';

        if (count($data)) {

            //拼接url

            $url .= '?';

            foreach ($data as $key => $value) {

                $url .= "{$suffix}{$key}={$value}";

                if ($suffix == '') {

                    $suffix = '&';

                }

            }

        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);

        // 是否启用代理

        if (defined('PROXY') && PROXY) {

            curl_setopt($ch, CURLOPT_PROXY, PROXY_HOST . ':' . PROXY_PORT);

        }

        $data = curl_exec($ch);

        curl_close($ch);

        //直接返回数据

        return $data;

    }
}