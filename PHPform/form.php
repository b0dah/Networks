<!doctype html>

<html>

<head>
    <?php //error_reporting( error_reporting() & ~E_NOTICE );?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!--     <link rel="stylesheet" -->
<!--           href="../static/form/style.css?ver=<?php echo filemtime(dirname(__DIR__) . "/static/auth/style.css") . '111'; ?>"> -->

    <link rel="stylesheet" type="text/css" href="formStyle.css">


    <title>Заполните форму</title>
    
    <style>
    .error{
        color: red;
    }
    </style>
</head>


<body>

<div class="center">
    <?php foreach ($messages as $message): ?>
        <div class="message"><?php echo $message ?></div>
    <?php endforeach; ?>

    <form action="formProcessing.php" method="POST" accept-charset="UTF-8">
        <label> Имя:&nbsp;
            <?php if ($errors['name']): ?>
                <span class="error"><?php echo strip_tags($errors['name']) ?></span>
            <?php endif ?>
            <br/>
            <input type="text"
                   class="<?php if ($errors['name']): ?>error<?php endif ?>"
                   name="name"
                   value="<?php echo $values['name'] ?>"/>
        </label><br/><br/>

        <label> Email:&nbsp;
            <?php if ($errors['email']): ?>
                <span class="error"><?php echo strip_tags($errors['email']) ?></span>
            <?php endif ?>
            <br/>
            <input type="text"
                   class="<?php if ($errors['email']): ?>error<?php endif ?>"
                   name="email"
                   value="<?php echo $values['email'] ?>"/>
        </label><br/><br/>

        <label> Дата рождения:
            <br/>
            <?php if ($errors['age']): ?>
                <span class="error"><?php echo strip_tags($errors['age']) ?></span>
            <?php endif ?>
            <select name="age">
                <option value="0">Не выбрано</option>
                <?php for ($i = 1990; $i < 2019; $i++): ?>
                    <option <?php if ($values['age'] == $i): ?>selected<?php endif?>
                            value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor ?>
            </select>
        </label><br/><br/>

        <label>Пол:
            <br/>
            <input type="radio" name="gender" value="male" checked> Мужской
            <input type="radio" name="gender" value="female"> Женский
        </label><br/><br/>

        <label> Количество конечностей:
            <br/>
            <input type="radio" name="Quantity" value="1" checked> 1
            <input type="radio" name="Quantity" value="2"> 2
            <input type="radio" name="Quantity" value="3"> 3
            <input type="radio" name="Quantity" value="4"> 4
        </label><br/><br/>

        <label> Сверхспособности:
            <br/>
            <select name="power[]"
                    multiple="multiple">
                <option value="S1">Бессмертие</option>
                <option value="S2">Прохождение сквозь стены</option>
                <option value="S3">Левитация</option>
            </select>
        </label><br/><br/>

        <label> Биография:&nbsp;
            <?php if ($errors['bio']): ?>
                <span class="error"><?php echo strip_tags($errors['bio']) ?></span>
            <?php endif ?>
            <br/>
            <textarea name="bio"
                      class="<?php if ($errors['bio']): ?>error<?php endif ?>"><?php echo $values['bio'] ?></textarea>
        </label><br/><br/>



        <label class="<?php if ($errors['contract']): ?>err<?php endif ?>">
            <input type="checkbox" name="contract" value='1'>С контрактом ознакомлен &nbsp
        
        <?php if ($errors['contract']): ?>
            <span class="error"><?php echo strip_tags($errors['contract']) ?></span>
        <?php endif ?>
        </label>
        <br/>

        <input type="submit" value="Отправить"/>
    </form>
</div>

</body>

</html>