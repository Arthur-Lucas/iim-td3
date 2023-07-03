<?php


declare(strict_types=1);

namespace Alucas\td3;

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Component\DomCrawler\Crawler;

class Scrapper
{
    private $httpClient;

    private $url = "https://www.starwars-holonet.com/encyclopedie/liste-personnages-armee-clone-republique.html";

    public function __construct()
    {
        $this->httpClient = HttpClient::create([
            'verify_peer' => false,
        ]);
    }
    public function getWebPage(): string
    {
        $response = $this->httpClient->request(
            'GET',
            $this->url
        );

        $statusCode = $response->getStatusCode();

        if($statusCode != 200){
            throw new \Exception("Error Processing Request", 1);
        } else {
            $contentType = $response->getHeaders()['content-type'][0];
            $content = $response->getContent();
            return $content;
        }

        
    }

    public function getAllcharacters(): array
    {
        try {
            // Envoyer une requête GET à l'URL de la page
            $response = $this->httpClient->request('GET', 'https://www.starwars-holonet.com/encyclopedie/liste-personnages-armee-clone-republique.html');

            // Vérifier le code de statut de la réponse
            if ($response->getStatusCode() === 200) {
                // Obtenir le contenu de la réponse
                $content = $response->getContent();

                // Créer une instance du Crawler avec le contenu HTML
                $crawler = new Crawler($content);

                // Sélectionner les éléments HTML contenant les informations des personnages
                $characterElements = $crawler->filter('.lstv2_nom');

                // Parcourir les éléments et extraire les informations souhaitées
                $characters = [];
                $characterElements->each(function (Crawler $element) use (&$characters) {
                    $name = $element->filter('h2')->text();
                    // $description = $element->filter('.list_characters_description')->text();

                    $characters[] = [
                        'name' => $name,
                        // 'description' => $description,
                    ];
                });

                return $characters;
            }
        } catch (TransportExceptionInterface $e) {
            // Gérer les erreurs de transport HTTP
            echo "Erreur lors de la requête HTTP : " . $e->getMessage();
        }

        return null;
    }
}
