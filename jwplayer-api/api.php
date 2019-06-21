<?php
    /*-----------------------------------------------------------------------------
     * PHP client library for JW Platform API
     *
     * Author:      Jamil Bashir
     * Copyright:   (c) 2019 The Mind Gauge
     * License:     BSD 3-Clause License
     *              See accompanying LICENSE file
     *
     * Version:     1
     * Created:     2019-6-20
     *
     * For the System API documentation see:
     * https://developer.jwplayer.com/jw-platform/
     *-----------------------------------------------------------------------------
     */

    class JwplatformAPI {
        private $_version = '1.5';
        private $_url = 'https://cdn.jwplayer.com/';
        private $_library;

        private $_key, $_secret;

        public function __construct($key, $secret) {
            $this->_key = $key;
            $this->_secret = $secret;

            // Determine which HTTP library to use:
            // check for cURL, else fall back to file_get_contents
            if (function_exists('curl_init')) {
                $this->_library = 'curl';
            } else {
                $this->_library = 'fopen';
            }
        }

        public function version() {
            return $this->_version;
        }

        // RFC 3986 complient rawurlencode()
        // Only required for phpversion() <= 5.2.7RC1
        // See http://www.php.net/manual/en/function.rawurlencode.php#86506
        private function _urlencode($input) {
            if (is_array($input)) {
                return array_map(array('_urlencode'), $input);
            } else if (is_scalar($input)) {
                return str_replace('+', ' ', str_replace('%7E', '~', rawurlencode($input)));
            } else {
                return '';
            }
        }

        // Sign API call arguments
        private function _sign($args) {
            ksort($args);
            $sbs = "";
            foreach ($args as $key => $value) {
                if ($sbs != "") {
                    $sbs .= "&";
                }
                // Construct Signature Base String
                $sbs .= $this->_urlencode($key) . "=" . $this->_urlencode($value);
            }

            // Add shared secret to the Signature Base String and generate the signature
            $signature = sha1($sbs . $this->_secret);

            return $signature;
        }

        // Add required api_* arguments
        private function _args($args) {
            $args['api_nonce'] = str_pad(mt_rand(0, 99999999), 8, STR_PAD_LEFT);
            $args['api_timestamp'] = time();

            $args['api_key'] = $this->_key;

            if (!array_key_exists('api_format', $args)) {
                // Use the serialised PHP format,
                // otherwise use format specified in the call() args.
                $args['api_format'] = 'php';
            }

            // Add API kit version
            $args['api_kit'] = 'php-' . $this->_version;

            // Sign the array of arguments
            $args['api_signature'] = $this->_sign($args);

            return $args;
        }
        function getMediaInfo()
        {

        }

            // Construct call URL
        private function _call_url($call, $args=array()) {
            $url = $this->_url . $call . '?' . http_build_query($this->_args($args), "", "&");
            return $url;
        }

        // Make an API call
        public function call($call, $args=array()) {
            $url = $this->_call_url($call, $args);

            $response = null;
            switch($this->_library) {
                case 'curl':
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_URL, $url);
                    $response = curl_exec($curl);
                    curl_close($curl);
                    break;
                default:
                    $response = file_get_contents($url);
            }

            $unserialized_response = @unserialize($response);
            return json_decode($response);
           // return $unserialized_response ? $unserialized_response : $response;
        }
        function dd($data,$flag=0)
        {
            echo "<pre>";
            var_dump($data);
            echo "</pre>";
            if($flag)
            die();
        }
    }
?>
