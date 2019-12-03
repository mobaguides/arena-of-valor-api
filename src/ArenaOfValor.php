<?php

namespace MobaGuides\ArenaOfValorApi;

use GuzzleHttp\Client;
use InvalidArgumentException;
use MobaGuides\ArenaOfValorApi\Fetchers\ApiFetcher;

class ArenaOfValor
{
    /**
     * @var Client
     */
    protected static $client;

    /**
     * Returns the given Arena Of Valor API fetcher
     *
     * @param string $fetcher
     * @return ApiFetcher
     */
    public static function make(string $fetcher)
    {
        if (! class_exists($fetcher) || ! is_subclass_of($fetcher, ApiFetcher::class)) {
            throw new InvalidArgumentException("Fetcher {$fetcher} is not a valid fetcher or does not exist");
        }

        if (! isset(self::$client)) {
            self::$client = new Client();
        }

        return new $fetcher(self::$client);
    }
}