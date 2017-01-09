<?php

namespace Mobytes\SendPush;

use Illuminate\Config\Repository;

class SendPush
{
    const API_URL = 'https://pushiner/api/v1/send_message/';
    private $title;
    private $msg;

    public function __construct(Repository $config)
    {
        // Fetch the config data and set up the required url´s
        $this->config = $config;
        $this->token_user = $this->config->get('sendpush.token_user');
        $this->token_app = $this->config->get('sendpush.token_app');
    }

    public function config($token_user, $token_app)
    {
        // in case you want to dynamically update the token user/app key
        $this->token_user = $token_user;
        $this->token_app = $token_app;
    }

    public function push($title, $msg)
    {
        $this->title = $title;
        $this->msg = $msg;
    }

    public function send()
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, self::API_URL);
        curl_setopt($c, CURLOPT_HEADER, false);
//        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, array(
            'token_user' => $this->token_user,
            'token_app' => $this->token_app,
            'title' => $this->title,
            'message' => $this->msg
        ));
        $response = curl_exec($c);
        $response = json_decode($response);
        return $response;
    }
}
