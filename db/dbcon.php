<?php 

$db['db_host'] = "petalcbcorg.ipagemysql.com";
$db['db_user'] = "formsdb";
$db['db_pass'] = "cbcp22wd";
$db['db_name'] = "calvarybc";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$con) {
	die('We are unable to connect to the Database. ERROR: '.mysqli_error($con));
}

//$con = mysql_connect('petalcbcorg.ipagemysql.com', 'formsdb', 'cbcp22wd');

?>