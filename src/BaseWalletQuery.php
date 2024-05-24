<?php

namespace BaseWalletQuery;

use GuzzleHttp\Client;
use Exception;


class BaseWalletQuery
{
    private $client;
    private $config;
    private $path;

    public function __construct(array $config)
    {
        // Validate the config
        $this->validateConfig($config);

        // Assign the config values
        $this->config = $config;

        // Set the path
        $this->path = "/v1/{$this->config['CHAIN']}";

        // Set up the client
        $baseUri = $this->config['BASE_URL'];
        $apiKey = $this->config['API_KEY'];
        

        $this->client = new Client([
            'base_uri' => $baseUri,
            'headers' => [
                'Content-Type' => 'application/json',

            ],
            'auth' => [$apiKey, '']
        ]);
    }

    /**
     * Validate the configuration
     *
     * @param array $config
     * @return void
     */
    private function validateConfig(array $config)
    {
        if (!isset($config['BASE_URL'])) {
            throw new Exception('base url is not set in the configuration.');
        }
        if (!isset($config['API_KEY'])) {
            throw new Exception('API Key is not set in the configuration.');
        }
    }

    /**
     * Get the wallet balances
     *
     * @param string $walletAddress
     * @return array|bool
     */
    public function QueryWalletBalances($walletAddress)
    {
        try {
            $url =  "{$this->path}/address/{$walletAddress}/balances_v2/";
            $response = $this->client->get($url);
            $data = json_decode($response->getBody(), true);

            return $data;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
