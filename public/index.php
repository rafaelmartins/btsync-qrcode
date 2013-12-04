<?php

chdir(__DIR__);

require '../vendor/autoload.php';

define('GCHART_TEMPLATE_URL', 'http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=%s&chld=H');
define('BTSYNC_TEMPLATE_URL', 'btsync://%s?n=%s');

$app = new \Slim\Slim();


function get_qrcode_url($secret, $dir) {
    $btsync_url = sprintf(BTSYNC_TEMPLATE_URL, $secret, basename($dir));
    return sprintf(GCHART_TEMPLATE_URL, urlencode($btsync_url));
}


$app->get('/', function () {
    echo 'Hello World!';
});


$app->run();
