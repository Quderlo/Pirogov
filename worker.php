<?php
error_reporting(E_ALL);


    $host = "localhost";
    $port = "5432";
    $dbname = "lev";
    $user = "postgres";
    $password = "";

    $con = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    if (!$con) {
        die("Ошибка: Не удалось подключиться к базе данных (pg_connect)!");
    }

    pg_close($con);

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css">
    <title> Меню </title>
</head>


<body>

</body>
</html>
<?php
    $id = session_id();
    print "$id";
?>

<div class="actions">
    <div class="workerActions">
        Активные заказы
    </div>

    <div class="workerActions">
        Свободные заказы
    </div>

    <div class="workerActions">
        История заказов заказов
    </div>

    <div class="workerActions">
        Добавить нового работника
    </div>
</div>


    </body>
</html>


