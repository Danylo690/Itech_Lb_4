<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
    <form method="POST" class="block">
        <div>Вход</div>
        <input type="text" name="login" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="submit" value="Войти">
        <div class="error">
            <?php 
            if(count($_POST))
            {
                error_reporting(0);
                $file_hendler = fopen("Data\Data.txt", "r");
                $data = array();
                if (!$file_hendler) {
                    echo("Невозможно открыть файл");
                }
                else {
                    //Занесение данных в масив
                    while (($buffer = fgets($file_hendler, 4096)) !== false) {
                        list($login, $pass) = explode(" ", $buffer);
                        $data[$login] = $pass;
                    }
                    $login = $_POST['login'];
                    $pass = $_POST['password'];
                    if($data[$login] == $pass)
                    {
                        echo "Вы залогинены, $login";
                    }
                    else
                    {
                        echo "Не удалось войти";
                    }
                }
            }
            ?>
        </div>
    </form>
</body>
</html>