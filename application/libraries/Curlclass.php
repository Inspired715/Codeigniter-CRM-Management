<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curlclass {
    public function exec_curl($url, $headers, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $server_output = curl_exec($ch);
        
        curl_close ($ch);
        
        return $server_output;
      }
}