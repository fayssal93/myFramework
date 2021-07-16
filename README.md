# myFramework
1- composer init : initialisation de composer, autoloader, instatlation de packages
2- une classe representera notre application dans cette classe on chargera les modules : 
    $app = new App([

    ]); 
    $app->run(); 

3- Pour le traitement des requetes et le renvoie des reponses nous utiliserons le package PSR-7 guzzlehttp.

4- générer une requete à partir des variables globales : 
$response = $app->run(\Guzzlehttp\Psr7\ServerRequest::fromGlobals());

5- installer composer require http-interop/response-sender pour afficher le contenu des objets Guzzle Response  
