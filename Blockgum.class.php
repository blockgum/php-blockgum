<?php
/**
 * Blockgum PHP Library
 *
 * This library provides convenient methods for interacting with the Blockgum App API.
 *
 * @copyright Blockgum.com
 * @license   Commercial License
 * Version : 2.0
 */
class Blockgum
{

    private $api_url;
    private $chain;
    private $jwt_token;
    private $client_id;
    public $security_type = 1;
    /**
     * @var int|mixed
     */
    private $decimals;


    function __construct($bg_config)
    {
        $this->api_url = $bg_config['api_url'];
        $this->chain = $bg_config['chain'];
        $this->jwt_token = $bg_config['jwt_token']; //main account
        $this->client_id = $bg_config['client_id'];
        $this->security_type = $bg_config['security_type'];
        if (array_key_exists('decimals', $bg_config)) {
            $decimals = $bg_config['decimals'];
          }else{
            $decimals = 18;
          }
          $this->decimals=$decimals;
    }

    function createAddress($uid)
    {
        $method_url = "createAddress/id/$uid";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function searchByUid($uid)
    {
        $method_url = "searchByUid/$uid";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function create10k($start, $limit)
    {
        $method_url = "create10k/start/$start/limit/$limit";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function searchAddresses($address)
    {
        $method_url = "search/address/$address";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function wildcardSearch($type, $term)
    {
        $method_url = "search/$type/$term";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function getWithdrawalInfo($order_id)
    {
        $method_url = "getWithdrawalInfo/order_id/$order_id";
        
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function transaction($tx_hash)
    {
        $method_url = "transaction/tx_hash/$tx_hash";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function transactionInfoDb($where, $tx_hash)
    {
        $method_url = "transactionInfoDb/$where/hash/$tx_hash";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function traceDeposit($tx_hash)
    {
        $method_url = "traceDeposit/tx_hash/$tx_hash";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function getAddressList($page = -1)
    {
        $method_url = "getAddressList?page=$page";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function watchToken($contact)
    {
        $method_url = "watchToken/$contact";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function deleteToken($contact)
    {
        $method_url = "deleteToken/$contact";
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function stats()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function getTokenList()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function moveDepositsToMainAccount()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function restartServer()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function about()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function isAdvancedSecurity()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function shutdownServer()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function signInAPI()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function getChainsFromEnv()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    function isRunning()
    {
        $method_url = __FUNCTION__;
        $resp = $this->customget($method_url);
        return $this->respHandle($resp);
    }

    /*post functions */

    function moveTokensToMainAccount($token_add)
    {
        $method_url = "moveTokensToMainAccount";
        $post_array = [
            "token_add" => $token_add
        ];
        $resp = $this->custompost($method_url, $post_array);
        return $this->respHandle($resp);
    }

    function getLatestDeposits($token_add='', $to_add='', $type = "unrecorded", $page = 1)
    {
        $method_url = "getLatestDeposits";
        $post_array = [
            "token_add" => $token_add,
            "to_add" => $to_add,
            "type" => $type,
            "page" => $page,
        ];
        $resp = $this->custompost($method_url, $post_array);
        
        return $this->respHandle($resp);
    }

    function getLatestWithdrawals($token_add, $to_add, $page = 1)
    {
        $method_url = "getLatestWithdrawals";
        $post_array = [
            "token_add" => $token_add,
            "to_add" => $to_add,
            "page" => $page,
        ];
        $resp = $this->custompost($method_url, $post_array);
        return $this->respHandle($resp);
    }

    function sendTx($from_uid, $from_add, $to_add, $amount, $order_id = 0)
    {
        $method_url = "sendTx";
        $post_array = [
            "from_uid" => $from_uid,
            "from_add" => $from_add,
            "to_add" => $to_add,
            "amount" => $amount,
            "order_id" => $order_id,
        ];
        $resp = $this->custompost($method_url, $post_array);
        return $this->respHandle($resp);
    }

    function sendToken($from_uid, $from_add, $to_add, $token_add, $amount, $order_id = 0)
    {
        $method_url = "sendToken";
        $post_array = [
            "from_uid" => $from_uid,
            "from_add" => $from_add,
            "to_add" => $to_add,
            "token_add" => $token_add,
            "amount" => $amount,
            "order_id" => $order_id,
        ];
        $resp = $this->custompost($method_url, $post_array);
        return $this->respHandle($resp);
    }

    function withdrawFromMain($to_add, $amount, $token_add = 0, $order_id = 0)
    {
        $method_url = "withdrawFromMain";
        $post_array = [
            "to_add" => $to_add,
            "amount" => $amount,
            "token_add" => $token_add,
            "order_id" => $order_id
        ];
        $resp = $this->custompost($method_url, $post_array);
        return $this->respHandle($resp);
    }

    function getBalance($address, $token_add = 0)
    {
        $method_url = "getBalance";
        $post_array = [
            "address" => $address,
            "token_add" => $token_add
        ];
        $resp = $this->custompost($method_url, $post_array);
        return $this->respHandle($resp);
    }

    function markAsRecorded($hash)
    {
        $method_url = "markAsRecorded";
        $post_array = [
            "hash" => $hash
        ];
        $resp = $this->custompost($method_url, $post_array);
        return $this->respHandle($resp);
    }
    public function amount_decode($val,$decimals=null){
        $amount=$this->format_num($val,0);
        $decimals=$decimals?:$this->decimals;

        return bcdiv($amount,bcpow(10,$decimals,0),8);
    }
    public function amount_encode($amount,$decimals=null){
        $decimals=$decimals?:$this->decimals;
        return bcmul($amount,bcpow(10,$decimals,0),0);
    }

    private function respHandle($resp) {
        if(!$resp){
            $resp=json_encode([],true);
        }
        $array_resp = json_decode($resp, true);
        if((array_key_exists('status',$array_resp) && array_key_exists('errorCode',$array_resp) ) && $array_resp['status']==0  && $array_resp['errorCode']){
            $this->logger('blockgum',$array_resp);
            return  ['status' => 0, 'errorCode' => $array_resp['errorCode'],'data' => [], 'error' => 'Currently service is down , Please check logs'];
        }
        return $array_resp;
    }

    private function getHeader($data = []): array
    {
        if ($this->security_type == 'off') {
            return [
                "Content-Type: application/x-www-form-urlencoded",
                "Authorization: Bearer $this->jwt_token",
                "x-api-key: $this->client_id"
            ];
        } else {
            //data


            return [
                "Content-Type: application/x-www-form-urlencoded",
                "Authorization: Bearer ".$this->jwt_encode($data,$this->jwt_token),
                "x-api-key: $this->client_id"
            ];
        }

    }

    private function customget($method_url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$this->api_url/$this->chain/" . $method_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $this->getHeader([]),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if (isset($httpcode['code']) && $httpcode['code'] !== 200) {
            $this->logger('blockgum_', $httpcode);
            $response = json_encode(['status' => 0, 'data' => [], 'error' => 'Could not connect with Server or other issues']);
        }
            return $response;
    }

    private function custompost($method_url, $post_array)
    {
        $curl = curl_init();
        $query = http_build_query($post_array);
        $header=$this->getHeader($post_array);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$this->api_url/$this->chain/" . $method_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $query,
            CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    private function jwt_encode($payload, $secret): string
    {

        $header = json_encode(array("typ" => "JWT", "alg" => "HS256"));
        $base64UrlHeader = $this->base64UrlEncode($header);
        $base64UrlPayload = $this->base64UrlEncode(json_encode($payload));
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
        $base64UrlSignature = $this->base64UrlEncode($signature);
        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }

    private function base64UrlEncode($data): string
    {
        $base64 = base64_encode($data);
        $base64Url = strtr($base64, '+/', '-_');
        return rtrim($base64Url, '=');
    }

    private function logger($name,$log){
        //do some logging
    }
    private function format_num($num, $decimals = 8) {
        return number_format($num, $decimals, '.', '');
    }
}
