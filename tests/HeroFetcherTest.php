<?php

use MobaGuides\ArenaOfValorApi\Exceptions\HeroNotFoundException;
use MobaGuides\ArenaOfValorApi\Fetchers\Hero;
use MobaGuides\ArenaOfValorApi\ArenaOfValor;
use PHPUnit\Framework\TestCase;

class HeroFetcherTest extends TestCase
{
    /**
     * @var Hero
     */
    protected $heroFetcher;

    public function setUp(): void
    {
        parent::setUp();
        $this->heroFetcher = ArenaOfValor::make(Hero::class);
    }

    public function test_it_can_fetch_all_heroes()
    {
        $heroes = $this->heroFetcher->all();
        $this->assertTrue($heroes->count() > 3);
    }

    public function test_it_throws_a_hero_not_found_exception_when_an_invalid_id_is_given_on_hero_detail_retrival()
    {
        $this->expectException(HeroNotFoundException::class);
        $this->heroFetcher->detail('notfound');
    }

    public function test_it_retrieves_hero_details()
    {
        $hero = $this->heroFetcher->detail(106);
        $this->assertEquals('Krixi', $hero->name);
    }

    public function test_it_returns_correct_role()
    {
        $roles = array(
            1 => 'Tank',
            2 => 'Warrior',
            3 => 'Assassin',
            4 => 'Mage',
            5 => 'Marksman',
            6 => 'Support'
        );

        for ($i = 1; $i <= 6; $i++) {
            $this->assertEquals($roles[$i], $this->heroFetcher->role($i));
        }
    }
}