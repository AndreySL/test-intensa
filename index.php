<?php
session_start();
require_once('php/Reducer.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Тестовое задание</title>
</head>

<body>
    <div class="content">
        <h2>Сервис для сокращения ссылок.</h2>
        <form name='url_form' action="php/reduce.php" method="POST">
            <input class="url_input" type="text" name="url" placeholder="Введите URL" autofocus required>
            <input class="submit_input" type="submit" value="Сократить">
        </form>
        <span class="short_link">
            <?php
            if (isset($_SESSION['success'])) {
                echo "<div class='sub'>
                <h1 id='link'>" . $_SESSION['success'] . "</h1>
                <button class='copyBtn'>Копировать</button>
                </div>"
                ;
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['error'])) {
                echo "<span>" . $_SESSION['error'] . "</span>";
                unset($_SESSION['error']);
            }
            ?>
        </span>
    </div>
    <script src="script.js"></script>
</body>

</html>