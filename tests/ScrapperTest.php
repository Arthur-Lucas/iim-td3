<?php 

use PHPUnit\Framework\TestCase;
use Alucas\td3\Scrapper;

class ScrapperTest extends TestCase
{

    public function testGetAllcharacters()
    {

        $scrapper = new Scrapper();
        $this->assertIsArray($scrapper->getAllcharacters());
    }
}