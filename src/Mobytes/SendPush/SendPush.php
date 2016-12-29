<?php
/**
 * Created by PhpStorm.
 * User: ever
 * Date: 12/29/16
 * Time: 10:26 AM
 */

namespace Mobytes\SendPush;

use Illuminate\Config\Repository;

class SendPush
{
    const API_URL = 'http://notify.mobytesac.com/api/v1/send_message/';
    private $callback;
    private $sound;
    private $device;
    private $timestamp;
    private $url;
    private $urlTitle;
    private $debug;
    private $priority;
    private $retry;
    private $expire;
    private $title;
    private $msg;
    private $html = 1;

    public function __construct(Repository $config)
    {
        // Fetch the config data and set up the required url´s
        $this->config = $config;
        $this->token_user = $this->config->get('SendPush.token_user');
        $this->token_app = $this->config->get('SendPush.token_app');
    }

    public function config($token, $user_key)
    {
        // in case you want to dynamically update the token/user key
        $this->token = $token;
        $this->user_key = $user_key;
    }

    public function push($title, $msg)
    {
        $this->title = $title;
        $this->msg = $msg;
    }

    public function url($url, $title)
    {
        $this->urlTitle = $title;
        $this->url = $url;
    }

    public function callback($callback)
    {
        $this->callback = $callback;
    }

    public function sound($sound)
    {
        $this->sound = $sound;
    }

    public function debug($debug = null)
    {
        if ($debug == null) {
            $this->debug = false;
        } else {
            $this->debug = $debug;
        }
    }
    public function device($device)
    {
        $this->device = $device;
    }
    public function html($html)
    {
        $this->html = $html;
    }
    public function timestamp($timestamp = null)
    {
        if ($timestamp == null) {
            $timestamp = time();
        }
        $this->timestamp = $timestamp;
    }
    public function priority($priority = 0, $retry = 60, $expire = 365)
    {
        $this->priority = $priority;
        $this->retry = $retry;
        $this->expire = $expire;
    }

    public function send()
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, self::API_URL);
        curl_setopt($c, CURLOPT_HEADER, false);
//        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, array(
            'token_user'     => $this->token_user,
            'token_app'      => $this->token_app,
            'title'     => $this->title,
            'message'   => $this->msg,
            /*'device'    => $this->device,
            'timestamp' => $this->timestamp,
            'html'      => $this->html,
            'callback'  => $this->callback,
            'sound'     => $this->sound,
            'url'       => $this->url,
            'url_title' => $this->urlTitle,
            'priority'  => $this->priority,
            'retry'     => $this->retry,
            'expire'    => $this->expire*/
        ));
        $response = curl_exec($c);
        if ($this->debug) {
            return $response;
        } else {
            $response = json_decode($response);
            return $response->status;
        }
    }
}