<?php

declare(strict_types=1);

namespace Alucas\td3;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class Scrapper
{

    public function __construct(
        private HttpClientInterface $client,
    ) {
    }
    // Fonction pour envoyer une requête HTTP GET
    public function getWebPage($url): array
    {
        $response = $this->client->request(
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
