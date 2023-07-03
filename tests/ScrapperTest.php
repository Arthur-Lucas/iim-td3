<?php 

use PHPUnit\Framework\TestCase;
use Alucas\td3\Scrapper;

class ScrapperTest extends TestCase
{

    public function testGetWebPage()
    {
        $scrapper = new Scrapper();
        $this->assertIsArray($scrapper->getWebPage("https://www.starwars-holonet.com/encyclopedie/liste-personnages-armee-clone-republique.html"));
    }
}