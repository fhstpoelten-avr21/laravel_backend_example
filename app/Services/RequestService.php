<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Contracts\RequestServiceInterface;

/**
 * Class RequestService
 *
 * @package App\Services
 */
class RequestService implements RequestServiceInterface
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzleHttpClient;

    /**
     * @var string
     */
    protected $serviceBaseUrl;

    /**
     * @var string
     */
    protected $bearerToken;

    /**
     * ServiceRequest constructor.
     *
     * @param string $serviceBaseUrl
     * @param string|null $bearerToken
     */
    public function __construct(string $serviceBaseUrl, string $bearerToken = null)
    {
        $this->bearerToken = $bearerToken;
        $this->serviceBaseUrl = $serviceBaseUrl;
        $this->guzzleHttpClient = new Client(
            [
                'verify' => config('api-client.verify_host'),
                'connect_timeout' => config('api-client.curl_timeout'),
            ]
        );
    }

    /**
     * @param string $url
     * @param array $payload
     * @return array
     * @throws \Throwable
     */
    public function post(string $url, array $payload): array
    {
        return $this->request(Request::METHOD_POST, $url, $payload);
    }

    /**
     * @param string $url
     * @param array $payload
     * @return array
     * @throws \Throwable
     */
    public function patch(string $url, array $payload): array
    {
        return $this->request(Request::METHOD_PATCH, $url, $payload);
    }

    /**
     * @param string $url
     * @param array $payload
     * @return array
     * @throws \Throwable
     */
    public function put(string $url, array $payload): array
    {
        return $this->request(Request::METHOD_PUT, $url, $payload);
    }

    /**
     * @param string $url
     * @return array
     * @throws \Throwable
     */
    public function get(string $url): array
    {
        return $this->request(Request::METHOD_GET, $url);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $payload
     * @param array $query
     * @return array
     * @throws \Throwable
     */
    public function request(string $method, string $url, array $payload = [], array $query = [])
    {
        try {
            /** @var \GuzzleHttp\Psr7\Response $response */
            $response = $this->guzzleHttpClient->request($method, $this->getServiceBaseUrl().$url, [
                RequestOptions::JSON => $payload,
                RequestOptions::HEADERS => $this->getRequestHeaders(),
                RequestOptions::QUERY => $this->computeQueryArray($url, $query),
            ]);

            return $this->sanitizeResponse($response);
        } catch (\Throwable $exception) {
            Log::info($exception);

            throw $exception;
        }
    }

    /**
     * @param string $url
     * @param array $query
     * @return array
     */
    protected function computeQueryArray(string $url, array $query)
    {
        /** @var array $urlQueryArray */
        parse_str(parse_url($url, PHP_URL_QUERY), $urlQueryArray);

        return array_merge($urlQueryArray, $query);
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     * @return array
     * @throws \Exception
     */
    protected function sanitizeResponse(Response $response): array
    {
        $payload = json_decode($response->getBody(), true);

        if (! $this->isJson()) {
            Log::info('Payload not a valid json object!', ['response' => $response->getBody()->getContents()]);

            throw new \Exception('Payload not a valid json object!');
        }

        return $payload;
    }

    /**
     * @return string
     */
    public function getServiceBaseUrl(): string
    {
        return $this->serviceBaseUrl;
    }

    /**
     * @return bool
     */
    protected function isJson(): bool
    {
        return json_last_error() == JSON_ERROR_NONE;
    }

    /**
     * @return array
     */
    protected function getRequestHeaders(): array
    {
        $headers =  [
            /* 'Authorization' => 'Bearer ' . $this->bearerToken, TODO: Authorization */
            'accept' => 'application/json',
        ];

        return $headers;
    }
}
