<?php

namespace Stelin\CekPajakApi;

use GuzzleHttp\Client;
use Stelin\CekPajakApi\Auth\Login;
use Stelin\CekPajakApi\Auth\LoginEntity;

/**
 * Main class.
 *
 * @author lintangtimur <lintangtimur915@gmail.com>
 * @api 1.1.0
 */
class CekPajak
{
    private $token;
    private $ssl = false;

    public function __construct($token = null) {
        $this->token = $token;
    }

    /**
     * generate url.
     *
     * @param bool $ssl
     * @return bool
     */
    public function ssl(bool $ssl){
        if($ssl == 'true'){
            $this->ssl = true;
        }
        return $this;
    }

    /**
     * cek pajak.
     *
     * @param string $kode_wilayah contoh H: untuk semarang
     * @param string $nomor
     * @param string $sub_wilayah
     * @return PajakResponse
     */
    public function cekPajak(string $kode_wilayah, string $nomor, string $sub_wilayah)
    {
        $baseurl = 'http' . ($this->ssl ? 's' : '') . '://' . Meta::BASE_URL;
        $client = new Client();

        try {
            $res = $client->post($baseurl . 'api/check_pajak', [
                'headers' => ['Authorization' => 'Bearer ' . $this->token],
                'json'    => [
                    'na'        => $kode_wilayah,
                    'nb'        => $nomor,
                    'nc'        => $sub_wilayah,
                    'signature' => $this->generateSignature($kode_wilayah, $nomor, $sub_wilayah),
                ],
            ])->withHeader('accept', 'application/json');

            $data = json_decode($res->getBody());

            return (new PajakResponse())->fromJson($data);

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();

            return $response->getBody();
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            $response = $e->getResponse();

            return $response->getBody();
        }
    }

    /**
     * generate signature.
     *
     * @param string $kode_wilayah
     * @param string $nomor
     * @param string $sub_wilayah
     * @return string
     */
    private function generateSignature(string $kode_wilayah, string $nomor, string $sub_wilayah): string {
        return hash_hmac(Meta::ALGO, $kode_wilayah . $nomor . $sub_wilayah, Meta::SIGNKEY);
    }

    /**
     * register akun.
     *
     * @param array $formRegister
     * @return void|string
     */
    public function register(array $formRegister): ?string {
        $baseurl = 'http' . ($this->ssl ? 's' : '') . '://' . Meta::BASE_URL;
        $client = new Client();

        try {
            $res = $client->post($baseurl . 'api/auth/register', [
                'json' => $formRegister,
            ])->withHeader('accept', 'application/json');

            return $res->getBody();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = $e->getResponse();
            return $response ? $response->getBody() : '';
        }
    }

    /**
     * Login.
     *
     * @param array $formLogin
     * @return LoginEntity
     */
    public function login(array $formLogin): LoginEntity {
        $baseurl = 'http' . ($this->ssl ? 's' : '') . '://' . Meta::BASE_URL;
        $client = new Client();

        try {
            $res = $client->post($baseurl . 'api/auth/login', [
                'json' => $formLogin,
            ])->withHeader('accept', 'application/json');

            return (new LoginEntity())->fromJson(json_decode($res->getBody()));
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = $e->getResponse();
            return $response ? $response->getBody() : '';
        }
    }
}
