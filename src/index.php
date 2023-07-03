<?php

    use Alucas\td3\Scrapper;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrapper Star wars clone</title>
</head>
<body>
    <?php

        $url = 'https://www.starwars-holonet.com/encyclopedie/liste-personnages-armee-clone-republique--page-2.html';

        $scrapper = new Scrapper();

        // Récupérer le contenu HTML de la page
        $html = $scrapper->getWebPage($url);

        // Créer une instance du parseur DOMDocument
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);

        // Charger le contenu HTML dans le parseur DOMDocument
        $dom->loadHTML($html);

        // Utiliser les méthodes du parseur DOMDocument pour extraire les données de la page
        // Par exemple, pour extraire tous les liens de la page :
        $links = $dom->getElementsByTagName('a');
        foreach ($links as $link) {
            echo $link->getAttribute('href') . "\n";
        }
    ?>
</body>
</html>


