<!DOCTYPE html>
<html>
<head>
<title>Forms</title>
<html lang="en">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet"> 
</head>
<body>
<header>
<h1>Создание формы(для администратора)</h1>
</header>
<main>


<form class="form-control" name="form_add" method="post" action="">
<label for="adminpassword">Введите пароль, если вы админ</label>
<input class="form-control" id="adminpassword" type="password" name="adminpassword" placeholder="Введите пароль">
<input type="submit" name="button" class="form-control" value="Ну ка проверим"> 
</form>


<?php
$rightpass='12345';
$adminpassword = $_POST['adminpassword'];
$adminpassword = (string)$_POST['adminpassword'];
if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
// если были переданы данные для добавления в БД
if( isset($_POST['button']) && $_POST['button']== 'Ну ка проверим')
{ 
    if ($rightpass==$_POST['adminpassword']){
        echo '
         <a href="results.php">А может посмотрим результаты опросов?</a>
         <a href="done.php">Или посмотрим существующие сессии?</a>
          <br>
          <a href="session.start.php">Выйти</a>
          <br>
        <form class="form-control" name="form_sess" method="post" action="">
        <label for="ids">Id сессии</label>
        <input class="form-control" type="text" id="ids" name="ids" placeholder="Введите id сессии">
        <label for="1q">Первый вопрос</label>
        <input class="form-control" type="text" id="1q" name="1q" placeholder="Первый вопрос">
        <label for="2q">Второй вопрос</label>
        <input  class="form-control" id="2q" type="text" name="2q" placeholder="Второй вопрос">
        <label for="3q">Третий вопрос</label>
        <input class="form-control" type="text" id="3q" name="3q" placeholder="Третий вопрос">
        <label for="4q">Четвертый вопрос</label>
        <input class="form-control" type="text" id="4q" name="4q" placeholder="Четвертый вопрос">
        <label for="5q">Пятый вопрос</label>
        <input class="form-control" type="text" id="5q" name="5q" placeholder="Пятый вопрос">
        <label for="6q">Первый вариант ответа на 5 вопрос</label>
        <input class="form-control" type="text" id="6q" name="6q">
        <label for="7q">Его цена(баллы)</label>
        <input class="form-control" type="number" min="-100" max="100" id="7q" name="7q">
        <label for="8q">Второй вариант ответа на 5 вопрос</label>
        <input class="form-control" type="text" id="8q" name="8q">
        <label for="9q">Его цена(баллы)</label>
        <input class="form-control" type="number" min="-100" max="100" id="9q" name="9q">
        <label for="10q">Шестой вопрос</label>
        <input class="form-control" type="text" id="10q" name="10q" placeholder="Шестой вопрос">
        <label for="11q">Первый вариант ответа на 6 вопрос</label>
        <input class="form-control" type="text" id="11q" name="11q">
        <label for="12q">Его цена(баллы)</label>
        <input class="form-control" type="number" min="-100" max="100" id="12q" name="12q">
        <label for="13q">Второй вариант ответа на 6 вопрос</label>
        <input class="form-control" type="text" id="13q" name="13q">
        <label for="14q">Его цена(баллы)</label>
        <input class="form-control" type="number" min="-100" max="100" id="14q" name="14q">
        <label for="15q">Третий вариант ответа на 6 вопрос</label>
        <input class="form-control" type="text" id="15q" name="15q">
        <label for="16q">Его цена(баллы)</label>
        <input class="form-control" type="number" min="-100" max="100" id="16q" name="16q">
        <input type="submit" name="buttonupdate" class="form-control" value="Создать форму" > 
        </form>
        </div>
        ';
    }
}
?>
<?php


$ids = $_POST['ids'];
$q1 = $_POST['1q'];
$q2 = $_POST['2q'];
$q3 = $_POST['3q'];
$q4 = $_POST['4q'];
$q5 = $_POST['5q'];
$q6 = $_POST['6q'];
$q7 = $_POST['7q'];
$q8 = $_POST['8q'];
$q9 = $_POST['9q'];
$q10 = $_POST['10q'];
$q11 = $_POST['11q'];
$q12 = $_POST['12q'];
$q13 = $_POST['13q'];
$q14 = $_POST['14q'];
$q15 = $_POST['15q'];
$q16 = $_POST['16q'];
$ids = (int)$_POST['ids'];
$q1 = (string)$_POST['1q'];
$q2 = (string)$_POST['2q'];
$q3 = (string)$_POST['3q'];
$q4 = (string)$_POST['4q'];
$q5 = (string)$_POST['5q'];
$q6 = (string)$_POST['6q'];
$q7 = (int)$_POST['7q'];
$q8 = (string)$_POST['8q'];
$q9 = (int)$_POST['9q'];
$q10 = (string)$_POST['10q'];
$q11 = (string)$_POST['11q'];
$q12 = (int)$_POST['12q'];
$q13 = (string)$_POST['13q'];
$q14 = (int)$_POST['14q'];
$q15 = (string)$_POST['15q'];
$q16 = (int)$_POST['16q'];

$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');

if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
// если были переданы данные для добавления в БД
if( isset($_POST['buttonupdate']) && $_POST['buttonupdate']== 'Создать форму')
{ 
// если были переданы данные для добавления в БД

  // формируем и выполняем SQL-запрос для добавления записи
$pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.form');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO std_941.form (qu1, ids, qu2, qu3, qu4, qu5, qu51, qu51b, qu52, qu52b, qu6, qu61, qu61b, qu62, qu62b, qu63, qu63b) VALUES ("'.
(string)($_POST['1q']).'","'.
(int)($_POST['ids']).'", "'.
(string)($_POST['2q']).'", "'.
(string)($_POST['3q']).'", "'.
(string)($_POST['4q']).'", "'.
(string)($_POST['5q']).'", "'.
(string)($_POST['6q']).'", "'.
(int)($_POST['7q']).'", "'.
(string)($_POST['8q']).'", "'.
(int)($_POST['9q']).'", "'.
(string)($_POST['10q']).'", "'.
(string)($_POST['11q']).'", "'.
(int)($_POST['12q']).'", "'.
(string)($_POST['13q']).'", "'.
(int)($_POST['14q']).'", "'.
(string)($_POST['15q']).'", "'.
(int)($_POST['16q']).
'")');
$q1 = '';
$q2 = '';
$q3 = '';
$q4 = '';
$q5 = '';
$q6 = '';
$q7 = '';
$q8 = '';
$q9 = '';
$q10 = '';
$q11 = '';
$q12 = '';
$q13 = '';
$q14 = '';
$q15 = '';
$q16 = '';
$ids='';
echo '<a href="session.php">Ссылка на сессию</a>';
}
?>
</main>
<footer>
<h3>Экзамен по PHP. Османова Карина, 191-321</h3>
</footer>
</body>
</html>