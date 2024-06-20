<?php

include './config.php';

class APICommon {
    /**
     * @param string $url
     * @param array|null $params
     * @param string $user
     * @param string $pass
     */
    public static function get($endpoint, $params, $user, $pass) {
        global $fetchUrl;

        $ch = curl_init();
        $url = $fetchUrl . $endpoint;
        if (isset($params)) {
            $queryParams = http_build_query($params);
            $url = $url . $queryParams;
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $user . ':' . $pass);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($response && ((string)$httpcode)[0]==='2') return $response;
        else  throw new Exception($response, $httpcode);
    }

    /**
     * @param string $url
     * @param array $body
     * @param string $user
     * @param string $pass
     */
    public static function post($endpoint, $body, $user, $pass){
        global $fetchUrl;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fetchUrl . $endpoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_USERPWD, $user . ':' . $pass);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($response && ((string)$httpcode)[0]==='2') return $response;
        throw new Exception($response, $httpcode);
    }

}
