<?php
require("vendor/autoload.php");
 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
 
require 'vendor/autoload.php';
require 'util/VistaXML.php' ;

$app = new \Slim\App;

$app->get('/', function (Request $request, Response $response) {
	$router = $this->router;
	return $response->withRedirect($router->pathFor('employees'));
});

$app->post('/api/employees', function (Request $request) use ($app) {
	$body = $request->getBody();
    $input = json_decode($body); 
	$salary_min = (float)$input->salary_min;
	$salary_max = (float)$input->salary_max;
	
	$str = file_get_contents(__DIR__ . '/employees.json');
	$arr = json_decode($str, true);
	$results = [];

	if(!empty($arr)){
		foreach($arr as $reg => $item){
			$salary = (float) str_replace(array("$",","), "", $item["salary"]);
			if($salary >= $salary_min && $salary <= $salary_max) $results[] = $item;
		}
	}
	
	$vista = new VistaXML();
	$vista->imprimir($results);
});

$app->get('/employees/{id}', function (Request $request, Response $response) {
	$html = NULL;
	$route = $request->getAttribute('route');
	$results = [];
	$employeeId = $route->getArgument('id');
	
	$str = file_get_contents(__DIR__ . '/employees.json');
	$arr = json_decode($str);
	
	/*$results = array_filter($arr, function($people) {
		global $employeeId;
		return $people['id'] == $employeeId;
	});*/
	//$results = array_shift($results);
	
	if(!empty($arr)){
		foreach($arr as $reg => $item){
			if($item->id== $employeeId){
				$results = $item;
				break;
			}
		}
	}
	
	if(!empty($results)) include("views/details.php");
	else $html.= "No encontramos el id solicitado";
	
	echo $html;	
	
});

$app->map(['GET', 'POST'], '/employees', function ($request, $response, $args) {
	
	$varpost = $request->getParsedBody();
	$email_find = $varpost["email"];
	
	$str = file_get_contents(__DIR__ . '/employees.json');
	$str = json_decode($str);
	
	include("views/list.php");
	
})->setName("employees");

$app->run();


?>