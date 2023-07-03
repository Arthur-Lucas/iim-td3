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
        $this->httpClient = HttpClient::create([
            'verify_peer' => false,
        ]);
    }
    public function getWebPage($url): array
    {
        $response = $this->httpClient->request(
            'GET',
            $url
        );

        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
        $content = $response->toArray();
        return $content;
    }
}
