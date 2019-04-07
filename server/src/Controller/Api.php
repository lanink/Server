<?php

namespace App\Controller;

// use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class Api {
	

	public function home(){
		$data = ['title' => 'home test'];
		return new JsonResponse($data);
	}

}
