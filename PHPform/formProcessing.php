<?php
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $messages = array();
    if (!empty($_COOKIE['save'])) {
        setcookie('save', '', 1000000);
        array_push($messages, 'Спасибо, результаты сохранены');
    }

    $values = array(
        'name' => empty($_COOKIE['form_name']) ? '' : $_COOKIE['form_name'],
        'email' => empty($_COOKIE['form_email']) ? '' : $_COOKIE['form_email'],
        'age' => empty($_COOKIE['form_age']) ? '' : $_COOKIE['form_age'],
        'bio' => empty($_COOKIE['form_bio']) ? '' : $_COOKIE['form_bio']
    );

//    setcookie('form_name', '', 1); // DESTROYER
//    setcookie('form_email', '', 1);
//    setcookie('form_bio', '', 1);

    $errors = array(
        'name' => empty($_COOKIE['error_name']) ? '' : $_COOKIE['error_name'],
        'email' => empty($_COOKIE['error_email']) ? '' : $_COOKIE['error_email'],
        'age' => empty($_COOKIE['error_age']) ? '' : $_COOKIE['error_age'],
        'bio' => empty($_COOKIE['error_bio']) ? '' : $_COOKIE['error_bio'],
        'contract' => empty($_COOKIE['error_contract']) ? '' : $_COOKIE['error_contract']
    );

    setcookie('error_name', '', 1);
    setcookie('error_email', '', 1);
    setcookie('error_age', '', 1);
    setcookie('error_bio', '', 1);
    setcookie('error_contract', '', 1);

    include(__DIR__ . '/form.php');
} else {
    $errors = FALSE;
    if (empty($_POST['name'])) {
        setcookie('error_name', 'Введите свое имя', time() + 60 * 60);
        $errors = TRUE;
    } else {
        setcookie('form_name', $_POST['name'], time() + 60 * 60);
        
        echo "<script type='text/javascript'>alert('setting cookie');</script>";
    }

    if (empty($_POST['email'])) {
        setcookie('error_email', 'Введите свой адрес электронной почты', time() + 60 * 60);
        $errors = TRUE;
    } else {
        setcookie('form_email', $_POST['email'], time() + 60 * 60);
    }

    if ($_POST['age'] == 0) {
        setcookie('error_age', 'Укажите Ваш возраст', time() + 60 * 60);
        $errors = TRUE;
    } else {
        setcookie('form_age', $_POST['age'], time() + 60 * 60);
    }

    if (empty($_POST['bio'])) {
        setcookie('error_bio', 'Введите свою биографию', time() + 60 * 60);
        $errors = TRUE;
    } else {
        setcookie('form_bio', $_POST['bio'], time() + 60 * 60);
    }

    if (!isset($_POST['contract'])) {
        setcookie('error_contract', 'Вы не ознакомились с контактом', time() + 60 * 60);
        $errors = TRUE;
    }

    if (!$errors) {
//        $xml = new SimpleXMLElement('<document/>');
//        $child = $xml->AddChild('name', $_POST['name']);
//        $child = $xml->AddChild('email', $_POST['email']);
//        $child = $xml->AddChild('age', $_POST['age']);
//        $child = $xml->AddChild('gender', $_POST['gender']);
//
//        if (!empty($_POST['power'])) {
//            $sp = $xml->AddChild('power');
//            foreach ($_POST['power'] as $power) {
//                $sp->AddChild($power, 'yes');
//            }
//        }
//
//        $child = $xml->AddChild('Quantity', $_POST['Quantity']);
//        $child = $xml->AddChild('bio', $_POST['bio']);
//
//
//        $files_dir = $_SERVER['DOCUMENT_ROOT'] . '/DataStorage/';
//        $file = $files_dir . uniqid() . '.xml';
//        $content = $xml->AsXML();
//
//        setcookie('save', '1');
//
//        file_put_contents($file, $content);
        
        // Saving to DB
        include('db_config.php');
        
        if ($insert_query = $connection->prepare("Insert into Users  (`name`, `e-mail`, `age`, `gender`) VALUES (?, ?, ?, ?)")) {
            $insert_query->bind_param("ssis", $_POST['name'], $_POST['email'],$_POST['age'], $_POST['gender']);
            $insert_query->execute();
            
            $insert_query -> close();
        }
        $connection->close();
    }

    header('Location: formProcessing.php');

}
