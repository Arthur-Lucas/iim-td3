<?php 

use PHPUnit\Framework\TestCase;
use Alucas\td3\Scrapper;

class ScrapperTest extends TestCase
{

    public function testGetAllNames()
    {
        $scrapper = new Scrapper();
        $this->assertIsArray($scrapper->getWebPage("https://www.starwars-holonet.com/encyclopedie/liste-personnages-armee-clone-republique.html"));
    }
    // public function testGetRandomNumber()
    // {
    //     $api = new Scrapper();
    //     $this->assertIsInt($api->getRandNumber());
    // }

    // public function testGetDate()
    // {
    //     $api = new Api();
    //     $this->assertInstanceOf(\DateTime::class, $api->getDate());

    //     $this->assertIsString($api->getDate());
    //     $this->assertSame(date('Y-m-d'), $api->getDateAsString());
    // }
}