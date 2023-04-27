<?php
namespace Stelin\CekPajakApi;


use GuzzleHttp\Client;

/**
 * Main class
 * 
 * @author lintangtimur <lintangtimur915@gmail.com>
 * @api 1.0
 */
class CekPajak
{
    private $token;

    public function __construct($token = null)
    {
        $this->token = $token;    
    }

    /**
     * cek pajak
     *
     * @param string $kode_wilayah contoh H: untuk semarang
     * @param string $nomor
     * @param string $sub_wilayah
     * @return void
     */
    public function cekPajak(string $kode_wilayah, string $nomor, string $sub_wilayah)
    {
        $client = new Client();
        
        try {
            $res = $client->post(Meta::BASE_URL."api/check_pajak", [
                'headers'=>['Authorization'=> 'Bearer '. $this->token],
                'json'=>[
                    "na"=> $kode_wilayah,
                    "nb"=> $nomor,
                    "nc"=> $sub_wilayah,
                    "signature"=> $this->generateSignature($kode_wilayah, $nomor, $sub_wilayah)
                ]
            ])->withHeader("accept", "application/json");
            
            return json_decode($res->getBody());

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            header('Content-Type: application/json');
            echo $response->getBody();
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            $response = $e->getResponse();
            header('Content-Type: application/json');
            echo $response->getBody();
        }
        
    }

    /**
     * generate signature
     *
     * @param string $kode_wilayah
     * @param string $nomor
     * @param string $sub_wilayah
     * @return string
     */
    private function generateSignature(string $kode_wilayah, string $nomor, string $sub_wilayah)
    {
        return hash_hmac(Meta::ALGO,$kode_wilayah.$nomor.$sub_wilayah, Meta::SIGNKEY);
    }
}