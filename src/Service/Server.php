<?php

declare(strict_types = 1);
namespace App\Service;

/**
 * 
 * @authors 还不如一只猪威威 (liamxin@yeah.net)
 * @date    2019-04-12 21:38:12
 * @version $Id$
 */

use Symfony\Component\DomCrawler\Crawler;
use App\Library\Http;


class Server {

	private $http;
    
    function __construct(){
        $this->http = new Http;
        $this->http->setHost('http://www.56shuku.org');
    }


	public function Home() : array
	{
		$list = [];
		// $html =	$this->http->get();

		// if ($html) {
		// 	@$f = fopen('h.html', 'a');
		// 	@fwrite($f, $html);
		// 	@fclose($f);
		// }
		
		$html = file_get_contents('h.html');
		
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

		return $list;

	}

}