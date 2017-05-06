<?php


namespace SmileDemo\Controller;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Smile\Controller\BaseController;

class TestController extends BaseController
{

    public function test(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $response->withJson(['hello', 'world']);
    }

}