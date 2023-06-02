<?php
function connectDB()
{
    return new mysqli(
        '127.0.0.1:3306',
        'root',
        '',
        'click'
    );
}
?>