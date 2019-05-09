<?php

namespace App\Plug;

use App\Libraries\Http;
use Symfony\Component\DomCrawler\Crawler;

/**
 * 
 */
class WuLiuShuku extends BasePlug
{
    private $http;

    function __construct(){
        $this->http = new Http;
        $this->http->setHost('http://www.56shuku.org');
    }

    public function run() : \Closure
    {
        return function (){
            $list = [];

            $html =	$this->http->get();

//            if ($html) {
//                @$f = fopen('56.html', 'w');
//                @fwrite($f, $html);
//                @fclose($f);
//            }


//            $this->http->setHost('http://www.56shuku.org/allvote/1.shtml');


            $Crawler = new Crawler;

            $Crawler->addHtmlContent($html);

            $content = $Crawler->filterXPath("//div[@id='content']/div[@id='wudu-tv']/div[@class='wudu-box']/div[@class='novelslist']/div[@class='content']");

            $content->each(function($node , $i) use (&$list){
                $book['cover'] = $node->filterXPath("//div[@class='top']/div[@class='image']/a/img/@src")->text();
                $book['title'] = $node->filterXPath("//div[@class='top']/dl/dt")->text();
                $book['introdue'] = trim($node->filterXPath("//div[@class='top']/dl/dd")->text()).'...';
                $book['url'] = $node->filterXPath("//div[@class='top']/div[@class='image']/a")->attr('href');
                $list[$i] = $book;
            });

            var_export($list);
        };
    }


}
