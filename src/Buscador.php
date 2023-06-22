<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url, string $element):array
    {
        $resposta = $this->httpClient->request('get', $url);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);

        $elemento = $this->crawler->filter($element);

        $cursos = [];
        foreach ($elemento as $curso) {
            $cursos[] = $curso->textContent;
        }
        return $cursos;
    }
}