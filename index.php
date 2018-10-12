<?php
require_once __DIR__ . '/vendor/autoload.php';

use Predis\Client;

Predis\Autoloader::register();

try {
    $redis = new Client();
    // This connection is for a remote server
    /*
        $redis = new PredisClient(array(
            "scheme" => "tcp",
            "host" => "153.202.124.2",
            "port" => 6379
        ));
    */


}
catch (Exception $e) {
    die($e->getMessage());
}

die;

//$redis->set('test_msg_key', 'test_test_test_message1');

$value = $redis->get('test_msg_key');

echo '<pre>';
var_dump($value);
echo '</pre>';

echo '<pre>';
var_dump($redis->exists('test_msg_key'));
echo '</pre>';


$keys = $redis->keys('*');
echo '<pre>';
var_dump($keys);
echo '</pre>';

$ar = [
    'test',
    'test11'
];

$benchmark = microtime(true);

/*for($i = 0; $i <= 50000; $i++) {
    $redis->hset('sadd', 'test_m_time' . $i, (string)time());
}*/
//$redis->getset('key', 'val'); //обноввить

/*for($i = 0; $i <= 10000; $i++) {
    $redis->rpop('subs');
}*/



echo '<pre>';
var_dump(microtime(true) - $benchmark);
echo '</pre>';


//$redis->set('arr', json_encode($ar));
//$redis->set('counter', 0);

//$redis->incr('counter'); // 1
//$redis->incr('counter'); // 2

//$redis->decr('counter'); // 1


//$redis->rpush("languages", 'french');
//$redis->rpush("languages", "arabic");

//$redis->lpush("languages", "english");

//$redis->lpush("languages", "swedish");
//die;

/*$lpop = $redis->lpop("languages");
echo '<pre>';
var_dump($lpop);
echo '</pre>';
die;*/

$arList = $redis->lrange('languages', 0, -1);

echo '<pre>';
var_dump($arList);
echo '</pre>';
/*
$redis->set('test_time', 'test_val');
$redis->expire('test_time', 14400);*/

/*$rpop =  $redis->rpop("languages"); // [english, french]
echo '<pre>';чч1
var_dump($rpop);
echo '</pre>';*/


/*$redis->llen("languages"); // 2

$redis->lrange("languages", 0, -1); // returns all elements
$redis->lrange("languages", 0, 1); // [english, french]*/