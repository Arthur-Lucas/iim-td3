<?php


declare(strict_types=1);

namespace Alucas\td3;

require_once __DIR__ . '/../vendor/autoload.php';

use stdClass;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Component\DomCrawler\Crawler;

class Scrapper
{
    private $httpClient;

    private $url;

    public function __construct()
    {
        $this->url = "https://www.starwars-holonet.com/encyclopedie/liste-personnages-armee-clone-republique";
        $this->httpClient = HttpClient::create([
            'verify_peer' => false,
        ]);
    }

    public function getAllcharacters(): array
    {
        try {
            $response = $this->httpClient->request('GET', $this->url . '.html');
            $characters = [];
            $pagination = [];
            $content = $response->getContent();

            $crawler = new Crawler($content);

            array_push($characters, $crawler->filter('.lstv2_element')->each(function (Crawler $element) {

                $clone = new CloneTrooper();
                $clone->name = $element->filter('.lstv2_nom')->text();
                $clone->description = $element->filter('.lstv2_intro')->text();
                $clone->imageLink = $element->filter('.lstv2_image')->filter('img')->attr('src');
                return $clone;
            }));
            
            $pagination = $crawler->filter('.pagination_conteneur')->filter('.pagination')->each(function (Crawler $element) {
                if(ctype_digit($element->text())){
                    return $element->text();
                }
                
            });

            $pagination = array_filter($pagination, function ($value) {
                return $value !== null;
            });

            foreach($pagination as $page){
            
                $response = $this->httpClient->request('GET', $this->url . '--page-' . $page . '.html');

                $content = $response->getContent();

                $crawler = new Crawler($content);

                array_push($characters, $crawler->filter('.lstv2_element')->each(function (Crawler $element) {

                    $clone = new CloneTrooper();
                    $clone->name = $element->text();
                    return $clone;
                }));
                
            }

            return $characters;
            
        } catch (TransportExceptionInterface $e) {
            // Gérer les erreurs de transport HTTP
            echo "Erreur lors de la requête HTTP : " . $e->getMessage();
        }

    }
}