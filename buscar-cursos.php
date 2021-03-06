#!/usr/bin/env php
<?php

require_once 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;

$client = new Client(['base_uri'=>'https://www.alura.com.br' , 'verify'=>false]); //Nega a verificação de ssl do site da alura
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso){
    exibeMensagem ($curso);
}
