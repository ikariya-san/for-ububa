<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Пономарченко В.Н.</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="row">
                <div class="col-3 nav_logo"></div>
                <div class="col-9">
                    <div class="nav_text">Информация</div>
                </div> 
            </div>
        </div>
    </div>
<div class="container">
<div class="row">
<div class="col-12">
<h1>Кто ты, воин?</h1>
</div>
</div>
<div class="row">
<div class="col-8">
<h2>Ахиллес, сын Пелея. Ахилл принадлежал к роду Эакидов. Его дед по мужской линии Эак, сын царя олимпийских богов Зевса и речной нимфы Эгины,
был царём острова Эгина в Сароническом заливе. Эндэида, дочь либо мудрого кентавра Хирона, либо мегарского героя Скирона,
родила Эаку двух сыновей — Теламона и Пелея; первый стал царём Саламина и отцом Большого Аякса, второй — царём одного из
фессалийских племён и отцом Ахилла. Матерью Ахилла была Фетида, одна из пятидесяти дочерей морского вещего бога- старца
Нерея. Зевс хотел сделать её своей возлюбленной, но ему было предсказано (по одной из версий, титаном Прометеем), что сын,
который родится от этого союза, станет сильнее отца и свергнет его. Поэтому Зевс отказался от Фетиды, и позже она стала
женой царя Пелея. На горе Пелион в пещере Хирона была сыграна свадьба, на которую пришли даже боги. Невеста получила
в подарок крылья Арки от Зевса, а жених — меч от Гефеста, коней Балия и Ксанфа от Посейдона, хламиду от Геры, свирель от
Афины, фиалу с изображением Эрота от Афродиты, копьё с ясеневым древком от Хирона. Богиню раздоров Эриду на свадьбу не
пригласили, и она, обидевшись, подбросила участникам празднества золотое яблоко из сада Гесперид с надписью
«Прекраснейшей», что вызвало спор между Афродитой, Афиной и Герой и впоследствии привело к Троянской войне.

Ахилл стал единственным ребёнком, родившимся в этом браке. До Фетиды Пелей был женат на Антигоне, дочери царя Фтии
Евритиона, и на Полидоре, дочери Периера (царя Спарты или Мессении). Первая родила ему дочь Полидору, жену Бора,
сына Периера, вторая родила сына Менестия. Наконец, Филократ упоминает дочь Пелея Полимеду, которая, по его данным,
была женой Менетия и матерью Патрокла. В этом случае получается, что Патрокл приходился Ахиллу родным племянником.</h2>
</div>
<div class="col-4">
<div class="row achilles_photo"></div>
<div><p class="title_photo">Пономарченко Владислав Николаевич</p></div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="button_js col-12">
            <button id="myButton">Click me</button>
            <p id="demo"></p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="hello">Привет, <?php echo $_COOKIE['User']?></h1>
        </div>
        <div class="col-12">
        <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
            <div class="col-15"><input type="text" class="form" type="text" name="title" placeholder="Заголовок вашего поста"></div>
            <div class="col-16"><textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста..."></textarea></div>
            <input type="file" name="file" /><br>
            <div class="col-17"><button type="submit" class="btn_red" name="submit">Сохранить пост!</button></div>
        </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/button.js"></script>
</body>
</html>

<?php 
    require_once('bd.php');
    $link = mysqli_connect('bd', 'root', 'kali', 'first');
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $main_text = $_POST['text'];

        if (!$title || !$main_text) die ("Заполните все поля");

        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

        if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
    }
    
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
?>
