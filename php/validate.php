<?php

function validateUrl($url)
{
    $splittedUrl = explode('.', $url);
    if (count($splittedUrl) >= 2) {
        return true;
    }
}
?>