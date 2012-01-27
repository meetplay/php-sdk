<?php

namespace Meetplay;

use OAuth2\OAuth2Client;

class Client extends OAuth2Client
{
    const DEFAULT_BASE_DOMAIN = 'meetplay.net';

    protected $default_config = array(
        'base_uri'         => 'http://v1.api.meetplay.net',
        'authorize_uri'    => 'http://meetplay.net/oauth/v2/authorize',
        'access_token_uri' => 'http://v1.api.meetplay.net/oauth/token',
        'cookie_support'   => true,
    );

    public function __construct(array $config = array())
    {
        parent::__construct(array_merge($this->default_config, $config));
    }

    public function getLoginUrl(array $params = array())
    {
        return $this->getVariable('authorize_uri').'?'.http_build_query(array_merge(array(
            'redirect_uri'  => $this->getCurrentUri(),
            'client_id'     => $this->getVariable('client_id'),
            'state'         => 'state',
            'response_type' => 'code',
        ), $params));
    }

    protected function makeOAuth2Request($path, $method = 'GET', $params = array()) {
        if ((!isset($params['access_token']) || empty($params['access_token'])) && $oauth_token = $this->getAccessToken()) {
            $params['access_token'] = $oauth_token;
        }

        return $this->makeRequest($path, $method, $params);
    }
}

