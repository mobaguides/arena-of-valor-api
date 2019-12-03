<?php

use MobaGuides\ArenaOfValorApi\Fetchers\Image;
use MobaGuides\ArenaOfValorApi\ArenaOfValor;
use PHPUnit\Framework\TestCase;

class ImageFetcherTest extends TestCase
{
    /**
     * @var Image
     */
    protected $imageFetcher;

    public function setUp(): void
    {
        parent::setUp();
        $this->imageFetcher = ArenaOfValor::make(Image::class);
    }

    public function test_it_returns_an_hero_profile_image()
    {
        $result = $this->imageFetcher->heroAvatar(106);
        $this->assertEquals('https://www.arenaofvalor.com/images/heroes/pic_122_122/106.jpg', $result);
    }

    public function test_it_returns_an_skill_icon()
    {
        $result = $this->imageFetcher->skillIcon(10610);
        $this->assertEquals('https://www.arenaofvalor.com/images/heroes/skill/10610.png', $result);
    }
}