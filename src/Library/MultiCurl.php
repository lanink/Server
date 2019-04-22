<?php

namespace App\Library;
/**
 * 
 * @authors 还不如一只猪威威 (liamxin@yeah.net)
 * @date    2019-04-12 21:36:57
 * @version $Id$
 */

class MultiCurl {

    public function rolling_curl($urls)
    {
        $queue = curl_multi_init();
        $map   = array();

        foreach ($urls as $url) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_NOSIGNAL, true);
            // 是否启用代理
            if (defined('PROXY') && PROXY) {
                curl_setopt($ch, CURLOPT_PROXY, PROXY_HOST . ':' . PROXY_PORT);
            }

            curl_multi_add_handle($queue, $ch);
            $map[(string) $ch] = $url;
        }

        $responses = array();
        do {
            while (($code = curl_multi_exec($queue, $active)) == CURLM_CALL_MULTI_PERFORM);

            if ($code != CURLM_OK) {break;}

            // a request was just completed -- find out which one
            while ($done = curl_multi_info_read($queue)) {

                // get the info and content returned on the request
                $info                                      = curl_getinfo($done['handle']);
                $error                                     = curl_error($done['handle']);
                $results                                   = curl_multi_getcontent($done['handle']);
                $responses[$map[(string) $done['handle']]] = compact('info', 'error', 'results');

                // remove the curl handle that just completed
                curl_multi_remove_handle($queue, $done['handle']);
                curl_close($done['handle']);
            }

            // Block for data in / output; error handling is done by curl_multi_exec
            if ($active > 0) {
                curl_multi_select($queue, 0.5);
            }

        } while ($active);

        curl_multi_close($queue);
        return $responses;
    }
}