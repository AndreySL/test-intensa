<?php
require_once(dirname(__DIR__) . './vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();

function connectDB() {
    return new mysqli(
        $_ENV['HOST'],
        $_ENV['USER_NAME'],
        $_ENV['USER_PASSWORD'],
        $_ENV['DB_NAME'],
    );
}

?>