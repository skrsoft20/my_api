<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('DB_USER', getenv("MYSQL_USER"));
define('DB_PASS', getenv("MYSQL_PASSWORD"));
define('DB_HOST', getenv("MYSQL_SERVER"));
define('DB_NAME', getenv("MYSQL_DATABASE"));

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($link, "utf8");

$query = "CREATE TABLE IF NOT EXISTS `table1` (
    `id` int NOT NULL,
    `name` varchar(10) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;";

mysqli_query($link, $query);


$query = "select * from table1 order by id asc";
$result = mysqli_query($link, $query);

$json = array();

while ($row = mysqli_fetch_array($result)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($link);

