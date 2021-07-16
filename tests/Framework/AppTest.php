<?php

namespace Test\Framework;

use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase {

    public function testRedirectTrailingSlash(){
        $app = new App(); 
        $request = new ServerRequest('GET', '/demoslash/');
        //@var \Psr\Http\Message\ResponseInterface $response
        $response = $app->run($request);  
        $this->assertEquals('/demoslash/', $response->getHeader('Location')); 
        $this->assertContains(301, $response->getStatusCode());
    }

    public function testBlog(){
        $app = new App(); 
        $request = new ServerRequest('GET', '/Blog'); 
        //@var \Psr\Http\Message\ResponseInterface $response
        $reponse = $app->run($request); 
        $this->assertContains('<h1>Bienvenue sur le blog</h1>', (string) $response->getBody());
        $this->assertEquals(200, $response->getStatusCode()); 
    }
}