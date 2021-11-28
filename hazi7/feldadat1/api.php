<?php

class Api
{

    private $url ;
    private $ch;

    public function __construct()
    {
        $this->url = 'https://fakestoreapi.com/products';
        $this->ch = curl_init($this->url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }

    public function getProducts()
    {
        curl_setopt($this->ch, CURLOPT_HTTPGET, true);
        $response_json = curl_exec($this->ch);
        curl_close($this->ch);
        return json_decode($response_json);
    }

}