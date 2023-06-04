<?php


// function validateUrl($url)
// {
//     $splittedUrl = explode('.', $url);
//     if (count($splittedUrl) >= 2) {
//         return true;
//     }
// }
function validateUrl($url)
{
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return true;
    } else {
        $splittedUrl = explode('.', $url);
        return count($splittedUrl) >= 2;
    }
}


?>