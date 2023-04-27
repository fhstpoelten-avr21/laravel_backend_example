<?php

namespace App\Contracts;

/**
 * Interface RequestServiceInterface
 *
 * @package App\Contracts
 */
interface RequestServiceInterface
{
    /**
     * @param string $url
     * @return array
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $url): array;

    /**
     * @param string $url
     * @param array $payload
     * @return array
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $url, array $payload): array;

    /**
     * @param string $url
     * @param array $payload
     * @return array
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put(string $url, array $payload): array;

    /**
     * @param string $url
     * @param array $payload
     * @return array
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function patch(string $url, array $payload): array;

    /**
     * @return string
     */
    public function getServiceBaseUrl();
}
