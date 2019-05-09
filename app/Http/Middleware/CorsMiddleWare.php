<?php
    /**
     * CorsMiddleWare
     * authors Hefa
     * date    2019-05-07 16:33
     * version 0.1
     */

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class CorsMiddleWare
    {
        private $headers;
        private $allow_origin;

        /**
         * @param Request $request
         * @param Closure $next
         * @return Response|mixed
         */
        public function handle(Request $request, Closure $next)
        {
            $this->headers = [

                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE，OPTIONS',
                'Access-Control-Allow-Headers' => $request->header('Access-Control-Request-Headers'),
//                'Access-Control-Allow-Credentials' => 'true',
                'Access-Control-Max-Age' => 86400
            ];

            $this->allow_origin = [
                'http://localhost:3000'
            ];

            $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

            if (!in_array($origin, $this->allow_origin) && !empty($origin)){
                return new Response('Forbidden', 403);
            }

            //如果是复杂请求，先返回一个200，并allow该origin
            if ($request->isMethod('options')){
                return $this->setCorsHeaders(new Response('OK', 200), $origin);
            }

            $response = $next($request);
            $methodVariable = array($response, 'header');

            if (is_callable($methodVariable, false, $callable_name)) {
                return $this->setCorsHeaders($response, $origin);
            }
            return $response;
        }

        /**
         * @param $response
         * @return mixed
         */
        public function setCorsHeaders($response, $origin)
        {
            foreach ($this->headers as $key => $value) {
                $response->header($key, $value);
            }

            if (in_array($origin, $this->allow_origin)) {
                $response->header('Access-Control-Allow-Origin', $origin);
            } else {
                $response->header('Access-Control-Allow-Origin', '');
            }

            return $response;
        }
    }
