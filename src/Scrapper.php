<?php


declare(strict_types=1);

namespace Alucas\td3;

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Scrapper
{
    private $httpClient;

    public function __construct()
    {
        // Initialisation du client HTTP Symfony HttpClient
        $this->httpClient = HttpClient::create([
            'verify_peer' => false,
        ]);
    }
    // Fonction pour envoyer une requête HTTP GET
    public function getWebPage($url): array
    {
        $response = $this->httpClient->request(
            'GET',
            $url
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}
