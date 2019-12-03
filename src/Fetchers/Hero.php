<?php

namespace MobaGuides\ArenaOfValorApi\Fetchers;

use MobaGuides\ArenaOfValorApi\Exceptions\HeroNotFoundException;

class Hero extends ApiFetcher
{

    const HERO_ENDPOINT = 'https://mws.eutc.ngame.proximabeta.com/fcgi-bin/gift.fcgi?heroid=%s&ticket=miniweb';

    const ROLE = array(
        1 => 'Tank',
        2 => 'Warrior',
        3 => 'Assassin',
        4 => 'Mage',
        5 => 'Marksman',
        6 => 'Support'
    );

    /**
     * Returns a collection of all heroes
     *
     * @return \Illuminate\Support\Collection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all()
    {
        $endpoint = sprintf(self::HERO_ENDPOINT, 0);
        return collect($this->get($endpoint)->data);
    }

    public function detail($id)
    {
        $endpoint = sprintf(self::HERO_ENDPOINT, $id);
        $response = $this->get($endpoint);

        if (! isset($response->data->name)) {
            throw new HeroNotFoundException("Hero {$id} not found");
        }

        return $response->data;
    }

    public function role($id)
    {
        return self::ROLE[$id];
    }

}