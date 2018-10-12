<?php
declare(strict_types=1);

/* Подключение к серверу MySQL */
$mysqli = new mysqli('localhost', 'grishi', '656215', 'test_redis');

if (mysqli_connect_errno()) {
    printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}

$benchmark = microtime(true);

//$query = 'INSERT INTO test_redis (\'srt\') VALUES ('. md5(time()) .')';

for ($i = 0; $i <= 50000; $i++) {
    $mysqli->query("INSERT INTO test (str) VALUES ('test');");
}

//result = $mysqli->query("INSERT INTO test (str) VALUES ('test');");

/*echo '<pre>';
var_dump($result);
echo '</pre>';*/

echo '<pre>';
var_dump(microtime(true) - $benchmark);
echo '</pre>';
/* Посылаем запрос серверу */
/*if ($result = $mysqli->query('SELECT Name, Population FROM City ORDER BY Population DESC LIMIT 5')) {

    print("Очень крупные города:\n");

    while ($row = $result->fetch_assoc()) {
        printf("%s (%s)\n", $row['Name'], $row['Population']);
    }
}*/

$result->close();
/* Закрываем соединение */
$mysqli->close();