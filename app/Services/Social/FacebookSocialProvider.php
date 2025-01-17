<?php

namespace STS\Services\Social;

use GuzzleHttp\Client;
use STS\Contracts\SocialProvider;

class FacebookSocialProvider implements SocialProvider
{
    protected $facebook;
    protected $token;
    protected $error;

    public function __construct($token)
    {
        $this->token = $token;
        $this->client = new Client();
    }

    public function getProviderName()
    {
        return 'facebook';
    }

    public function getUserData()
    {
        $response = $this->request('/me?fields=email,name,gender,cartype,picture.width(300),link'); // ,birthday
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody());

            \Log::info("FACEBOOK BODY: ". $response->getBody());

            if (isset($body->gender)) {
                if ($body->gender == 'male') {
                    $body->gender = 'male';
                } elseif ($body->gender == 'female') {
                    $body->gender = 'female';
                }
            } else {
                $body->gender = 'N/A';
            }

            if (isset($body->birthday)) {
                $auxBirth = explode('/', $body->birthday);
                if (is_array($auxBirth) && count($auxBirth) >= 3) {
                    $body->birthday = $auxBirth[2].'-'.$auxBirth[0].'-'.$auxBirth[1];
                }
            }

            return [
                'provider_user_id'      => $body->id,
                'email'                 => isset($body->email) ? $body->email : null,
                'name'                  => $body->name,
                'gender'                => isset($body->gender) ? $body->gender : null,
                'cartype'                => isset($body->cartype) ? $body->cartype : null,
                'birthday'              => isset($body->birthday) ? $body->birthday : null,
                'banned'                => false,
                'terms_and_conditions'  => false,
                'image'                 => $body->picture->data->url,
                // 'link'                  => isset($body->link) ? $body->link : null,
            ];
        } else {
            $this->error = ['error' => 'Error obteniendo el perfil'];

            return;
        }
    }

    public function getUserFriends()
    {
        $response = $this->request('/me/friends?limit=5000');
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody());
            $res = [];
            foreach ($body->data as $friend) {
                $res[] = $friend->id;
            }

            return $res;
        } else {
            $this->error = ['error' => 'Error obteniendo amistades'];

            return;
        }
    }

    public function getError()
    {
        return $this->error;
    }

    private function request($url)
    {
        $res = $this->client->request('GET', 'https://graph.facebook.com/v2.9'.$url.'&access_token='.$this->token);

        return $res;
    }
}
