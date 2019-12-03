<?php

namespace MobaGuides\ArenaOfValorApi\Fetchers;

use GuzzleHttp\Exception\GuzzleException;
use MobaGuides\ArenaOfValorApi\Exceptions\ImageNotFoundException;

class Image extends ApiFetcher
{
    const IMAGES_ENDPOINT = 'https://www.arenaofvalor.com/images/heroes/pic_122_122/';
    const SKILL_ENDPOINT = 'https://www.arenaofvalor.com/images/heroes/skill/';

    /**
     * Returns the hero profile image for the given hero ID
     *
     * @param int $heroId
     * @return string
     */
    public function heroAvatar(int $heroId): string
    {
        return self::IMAGES_ENDPOINT . $heroId . '.jpg';
    }

    /**
     * @param int $skillId
     * @return string
     */
    public function skillIcon(int $skillId): string
    {
        return self::SKILL_ENDPOINT . $skillId . '.png';
    }
}