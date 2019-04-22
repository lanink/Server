<?php

namespace App\Controller;

/**
 * 
 * @authors 还不如一只猪威威 (liamxin@yeah.net)
 * @date    2019-04-11 21:31:49
 * @version 0.0.1 
 */
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\Server;

class ApiCtl {
    
	private $server;


    function __construct()
    {
    	$this->server = new Server;
    }

	public function Home()
	{
		$data = $this->server->Home();
		return new JsonResponse($data);
	}


	public function Introduce(int $bookId)
	{
		$data = [
			'bookId' => 1,
			'title' => 'title',
			'cover' => 'cover',
			'Chapters' => [
				[
					'chapterId' => 1,
					'title' => 'Chapter title',
					'time' => 'time'
				]
			] 
		];
		return new JsonResponse($data);
	}


	public function Chapter(int $chapterId)
	{
		$data = [
			'chapterId' => 1,
			'title' => 'title',
			'content' => 'content',
			'nextChapterId' => 2 
		];
		return new JsonResponse($data);
	}

}