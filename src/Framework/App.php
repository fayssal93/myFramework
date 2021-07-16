<?php

namespace Framework;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App {

    /**
     * prend une requete en paramètre et renvoie une response
     */
    public function run(ServerRequestInterface $request): ResponseInterface{
        $uri = $request->getUri()->getPath();
        if (!empty($uri) && substr($uri, -1) === "/"){
            $reponse = new Response(); 
            $reponse = $reponse->withStatus(301);
            $reponse = $reponse->withHeader('Location', substr($uri, 0, -1));
            return $reponse; 
        }

        if($uri === '/blog'){
            return new Response(200, [], '<h1>Bienvenue sur le blog</h1>');
        }

        return  new Response(400, [], '<h4>Erreur 404</h4>');
    }

 
}