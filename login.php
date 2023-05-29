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

    function check_login($login, $conn) {
        $stmt = pg_prepare($conn, "check_login", "SELECT id FROM worker WHERE first_name = $1");
        $result = pg_execute($conn, "check_login", array($login));
        $row = pg_fetch_assoc($result);
        if ($row) {
            return $row['id'];
        } else {
            return false;
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = $_POST['login'];
    
        $user_id = check_login($login, $con);
        if ($user_id) {
            session_start();
            $_SESSION['user_id'] = $user_id;
            header('Location: worker.php');
        } else {
            $error = 'Работник не найден';
        }
    }

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css">
    <title> Выполните вход </title>
</head>


<body>
    <div class="login">
    <form method="POST">
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <label for="login">Логин:</label>
        <input type="text" name="login" placeholder="Введите ваш логин" class="login">
        <button type="submit" class="login">Войти</button>
    </form>
    </div>

</body>
</html>

