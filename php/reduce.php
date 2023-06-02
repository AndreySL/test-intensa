<?php
session_start();

require_once('./Reducer.php');
require_once('./validate.php');

$reducer = new Reducer();

if (isset($_POST['url'])) {
    $originalUrl = $_POST['url'];
    $isValidOriginalUrl = validateUrl($originalUrl);
    if ($isValidOriginalUrl) {
        $code = $reducer->getUrlAndReturnCode($originalUrl);
        $_SESSION['success'] = $reducer->generateLink($code);
    } else {
        $_SESSION['error'] = 'Некорректная ссылка';
    }
}

header("Location: ../index.php");
exit();
?>