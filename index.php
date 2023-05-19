<?php
error_reporting(E_ALL);

print "<html>";
print "<head>";
print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
print "<title>";
print "Пример работы использования PostgreSQL";
print "</title>";
print "</head>";
print "<body>";

$host = "localhost";
$port = "5432";
$dbname = "lev";
$user = "postgres";
$password = "";

$con = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$con) {
    die("Ошибка: Не удалось подключиться к базе данных (pg_connect)!");
}

$query = "SELECT * FROM public.order";

$res = pg_query($con, $query);

if (!$res) {
    die("Ошибка: Не удалось выполнить запрос (pg_query)!");
}

// вывод данных в браузер
echo "<table>";
echo "<tr><th></th><th>Фамилия</th><th>Имя</th><th>Телефон</th></tr>";

while ($row = pg_fetch_assoc($res)) {
    $id = $row['id'];
    $firstName = $row['first_name'];
    $secondName = $row['second_name'];
    $tel = $row['telephone'];
    echo "<tr><td>$id</td><td>$secondName</td><td>$firstName</td><td>$tel</td></tr>";
}
echo "</table>";


pg_close($con);

print "</body>";
print "</html>";

/*
$query = "SELECT * FROM public.worker";

$res = pg_query($con, $query);

if (!$res) {
    die("Ошибка: Не удалось выполнить запрос (pg_query)!");
}

// вывод данных в браузер
echo "<table>";
echo "<tr><th></th><th>Фамилия</th><th>Имя</th><th>Телефон</th></tr>";

while ($row = pg_fetch_assoc($res)) {
    $id = $row['id'];
    $firstName = $row['first_name'];
    $secondName = $row['second_name'];
    $tel = $row['telephone'];
    echo "<tr><td>$id</td><td>$secondName</td><td>$firstName</td><td>$tel</td></tr>";
}
echo "</table>";

*/

?>

