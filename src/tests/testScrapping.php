<?php 

use PHPUnit\Framework\TestCase;
use Alucas\td3\Scrapper;

class ApiTest extends TestCase
{

    public function testGetAllNames()
    {
        $scrapper = new Scrapper();
        $this->assertIsArray($scrapper->getAllNames());
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