<?php
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
require '../vendor/autoload.php';
$enableSandbox = true;
$paypalConfig = [
    'client_id' => 'Ae0Vktj7BgCd2HBj8xphpUbKuJWlB_itpwyhdK2m5rnZZTt4pEnG0QXYM-P_jPiLNHVa5RaNnR5ciklQ',
    'client_secret' => 'ECxuJ2NeXbdRL50R2UvEFVu6bVA92JTPX1oMeEu5_8APUcBWkZguIvAZTQC3qRW1d_pz8CXF4DkvKaWQ',
    'return_url' => 'http://localhost/theredapp/profile/charge/response.php',
    'cancel_url' => 'http://localhost/theredapp/profile/charge/canceled.html' 
];

/**
 * All default curl options are stored in the array inside the PayPalHttpConfig class. To make changes to those settings
 * for your specific environments, feel free to add them using the code shown below
 * Uncomment below line to override any default curl options.
 */
// \PayPal\Core\PayPalHttpConfig::$defaultCurlOptions[CURLOPT_SSLVERSION] = CURL_SSLVERSION_TLSv1_2;
/** @var \Paypal\Rest\ApiContext $apiContext */
$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'],$enableSandbox);

/**
 * Helper method for getting an APIContext for all calls
 * @param string $clientId Client ID
 * @param string $clientSecret Client Secret
 * @return PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret,$enableSandbox = false)
{
    // #### SDK configuration
    // Register the sdk_config.ini file in current directory
    // as the configuration source.
    /*
    if(!defined("PP_CONFIG_PATH")) {
        define("PP_CONFIG_PATH", __DIR__);
    }
    */
    // ### Api context
    // Use an ApiContext object to authenticate
    // API calls. The clientId and clientSecret for the
    // OAuthTokenCredential class can be retrieved from
    // developer.paypal.com
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId,$clientSecret)
    );
    // Comment this line out and uncomment the PP_CONFIG_PATH
    // 'define' block if you want to use static file
    // based configuration
    $apiContext->setConfig(['mode' => $enableSandbox ? 'sandbox':'live']);
    // Partner Attribution Id
    // Use this header if you are a PayPal partner. Specify a unique BN Code to receive revenue attribution.
    // To learn more or to request a BN Code, contact your Partner Manager or visit the PayPal Partner Portal
    // $apiContext->addRequestHeader('PayPal-Partner-Attribution-Id', '123123123');
    return $apiContext;
}
?>