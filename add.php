<?php
$ids='11';
$date=date("H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$ids=(int)($_POST["id"]);
$first = ($_POST["first"]);
$second = ($_POST["second"]);
$third = ($_POST["third"]);
$fourth =($_POST["fourth"]);
$choice = ($_POST["choice"]);
$chk1 = '0';
$chk2 = '0';
$chk3 = '0';
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');

if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
else {echo 'Данные были отправлены';}
// если были переданы данные для добавления в БД
if( isset($_POST['buttonupdate2'])&& $_POST['buttonupdate2']== 'Отправить форму')
{ 
$ids='11';
$first = (string)($_POST["first"]);
$second = (string)($_POST["second"]);
$third = (string)($_POST["third"]);
$fourth = (string)($_POST["fourth"]);
$choice = (string)($_POST["choice"]);
$chk1 = (string)($_POST["chk1"]);
$chk2 = (string)($_POST["chk2"]);
$chk3 = (string)($_POST["chk3"]);

  // формируем и выполняем SQL-запрос для добавления записи
$pre_id=mysqli_query($mysqli, 'SELECT * FROM results');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO results VALUES ("'.
$ids.'","'.
$id.'","'.
(string)($_POST["first"]).'","'.
(string)($_POST["second"]).'","'.
(string)($_POST["third"]).'","'.
(string)($_POST["fourth"]).'","'.
(string)($_POST["choice"]).'","'.
$chk1.'","'.
$chk2.'","'.
$chk3.'","'.
$ip.'","'.
$date.
'")');


if ($sql_res == false) {
    echo("<br>Произошла ошибка при выполнении запроса");
  }  else {
    echo '<br>Результат отправлен';
  }


$ids='';
$first = '';
$second = '';
$third = '';
$fourth = '';
$choice = '';
$chk1 = '';
$chk2 = '';
$chk3 = '';
}
 ?>