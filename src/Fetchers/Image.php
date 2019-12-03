<?php

namespace MobaGuides\ArenaOfValorApi\Fetchers;

use GuzzleHttp\Exception\GuzzleException;
use MobaGuides\ArenaOfValorApi\Exceptions\ImageNotFoundException;

class Image extends ApiFetcher
{
    const IMAGES_ENDPOINT = 'https://www.arenaofvalor.com/images/heroes/pic_122_122/';

    /**
     * Returns the hero profile image for the given hero ID
     *
     * @param $heroId
     * @return string
     * @throws GuzzleException
     * @throws ImageNotFoundException
     */
    public function heroAvatar($heroId): string
    {
        return self::IMAGES_ENDPOINT . $heroId . '.jpg';
    }
}