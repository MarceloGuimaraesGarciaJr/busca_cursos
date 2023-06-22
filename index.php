<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://alura.com.br/']);
$crawler = new Crawler();
$element = 'span.card-curso__nome';
$url = '/cursos-online-programacao/php';
$buscador = new Buscador($client,$crawler);

$response = $buscador->buscar($url,$element); // esse for each é feito pois é um array de strings.

var_dump($response);

foreach ($response  as $cursos){
    echo $cursos . PHP_EOL;
}