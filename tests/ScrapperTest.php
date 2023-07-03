<?php 

use PHPUnit\Framework\TestCase;
use Alucas\td3\Scrapper;

class ScrapperTest extends TestCase
{

    public function testGetWebPage()
    {
        $scrapper = new Scrapper();
        $this->assertIsArray($scrapper->getWebPage("https://lolesports.com/schedule?leagues=lec,lfl,msi,worlds"));
    }
}