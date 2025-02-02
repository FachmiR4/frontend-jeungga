<?php
namespace App\Utility;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class Http {

    public static function get_valid_url($url){
        return config('services.api_domain.base_api_url').$url;
    }

    public static function get_valid_url_external($url){
        return config('services.api_domain.base_api_url').$url;
    }


    public static function getError($code, $response){

        $data = array();
        $rsp = '';

        if(gettype($response) == 'string'){
            $rsp = $response;
        }else{
            $data = json_decode($response->getBody(), true);
        }

        return [
            'Status'        => 'error',
            'StatusCode'    => $code,
            'Message'       => $rsp,
            'Data'          => $data
        ];
    }

    public static function postRequest($url, $params = array()){
        $client     = new Client();
        $response   = array();

        $url = Http::get_valid_url($url);

        if(!isset($params['header'])) $params['header'] = array();
        if(!isset($params['body'])) $params['body'] = array();

        try {
            $response = $client->request('POST', $url, [
                'headers'       => $params['header'],
                'form_params'   => $params['body']
            ]);

            $response = $response->getBody();

        } catch (RequestException $e) {
            if($e->getCode() != 0){
                if(isset($params['body']['FromJS']) && $params['body']['FromJS'] != "true"){
                    if ($e->getCode() == 401) {
                        // \Session::flush();
                        abort(401);
                    }else if ($e->getCode() == 403) {
                        abort(403);
                    }
                }
                $response = Http::getError($e->getResponse()->getStatusCode(), $e->getResponse());
            }else{
                $response = Http::getError(404, $e->getMessage());
            }
        }
        catch (Exception $e){
            $response = Http::getError(404, $e->getMessage());
        }

        return $response;
    }

    public static function post($url, $params = array()){
        $client     = new Client();
        $response   = array();

        $url = Http::get_valid_url($url);

        if(!isset($params['header'])) $params['header'] = array();
        if(!isset($params['body'])) $params['body'] = array();
        // dd($params);

        try {

            $response = $client->request('POST', $url, [
                'headers'       => $params['header'],
                'form_params'   => $params['body']
            ]);


            $response = $response->getBody();
        } catch (RequestException $e) {
            if($e->getCode() != 0){
                if(isset($params['body']['FromJS']) && $params['body']['FromJS'] != "true"){
                    if ($e->getCode() == 401) {
                        // \Session::flush();
                        abort(401);
                    }else if ($e->getCode() == 403) {
                        abort(403);
                    }
                }
                $response = Http::getError($e->getResponse()->getStatusCode(), $e->getResponse());
            }else{
                $response = Http::getError(404, $e->getMessage());
            }
        }
        catch (Exception $e){
            $response = Http::getError(404, $e->getMessage());
        }

        return $response;
    }

    public static function postRequestDataJson($url, $params = []) {
        $client = new Client();
        $url = Http::get_valid_url($url);
        $params += ['header' => [], 'body' => []]; // Use array union to set default values
        try {
            $body = is_array($params['body']) ? $params['body'] : []; // Check if body is array
            // dd(json_encode($body));
            $response = $client->request('POST', $url, [
                'headers'     => $params['header'],
                // 'form_params' => json_encode($body)
                'body'    => json_encode($body)
            ]);

            return $response->getBody();
        } catch (RequestException $e) {
            if ($e->getResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();

                if (isset($params['body']['FromJS']) && $params['body']['FromJS'] != "true") {
                    if ($statusCode == 401) {
                        abort(401);
                    } else if ($statusCode == 403) {
                        abort(403);
                    }
                }

                return Http::getError($statusCode, $e->getResponse());
            } else {
                return Http::getError(404, $e->getMessage());
            }
        } catch (Exception $e) {
            return Http::getError(404, $e->getMessage());
        }
    }



    public static function postLogin($url, $params = array()){
        $client     = new Client();
        $response   = array();

        $url = Http::get_valid_url($url);
        if(!isset($params['header'])) $params['header'] = array();
        if(!isset($params['body'])) $params['body'] = array();

        try {
            $response = $client->request('POST', $url, [
                'headers'       => $params['header'],
                'form_params'   => $params['body']
            ]);

            $response = $response->getBody();

        } catch (RequestException $e) {
            if($e->getcode() != 0){
                $response = Http::getError($e->getResponse()->getstatusCode(), $e->getResponse());
            }else{
                $response = Http::getError(404, $e->getMessage());
            }
        }
        catch (Exception $e){
            $response = Http::getError(404, $e->getMessage());
        }

        return $response;
    }

    public static function postFileRequest($url, $params = array()){
        $client     = new Client();
        $response   = array();

        $url = Http::get_valid_url($url);

        if(!isset($params['header'])) $params['header'] = array();
        if(!isset($params['body'])) $params['body'] = array();
        // dd($params);
        try {

            $response = $client->request('POST', $url, [
                'multipart' => $params['body'],
                'headers'   => $params['header'],
            ]);

            $response = $response->getBody();

        } catch (RequestException $e) {
            if($e->getCode() != 0){
                if(isset($params['body']['FromJS']) && $params['body']['FromJS'] != "true"){
                    if ($e->getCode() == 401) {
                        // \Session::flush();
                        abort(401);
                    }else if ($e->getCode() == 403) {
                        abort(403);
                    }
                }
                $response = Http::getError($e->getResponse()->getStatusCode(), $e->getResponse());
            }else{
                $response = Http::getError(404, $e->getMessage());
            }
        }
        catch (Exception $e){
            $response = Http::getError(404, $e->getMessage());
        }

        return $response;
    }
}
?>
