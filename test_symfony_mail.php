<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__FILE__)."/vendor/autoload.php";

$dotenv = new Dotenv();
$dotenv->load(__DIR__."/.env");

$dsn = $_ENV["MAILER_DSN"];
echo "DSN lu depuis .env : " . $dsn . "\n";

