<?php
$ids='11';
$date=date("H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');

if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
else {echo 'Данные были отправлены';}
// если были переданы данные для добавления в БД
if( isset($_POST['buttonupdate2'])&& $_POST['buttonupdate2']== 'Отправить форму')
{ 
$ids='11';

  // формируем и выполняем SQL-запрос для добавления записи
$pre_id=mysqli_query($mysqli, 'SELECT * FROM results');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO results VALUES ("'.
$ids.'","'.
$id.'","'.
htmlspecialchars($_POST["first"]).'","'.
htmlspecialchars($_POST["second"]).'","'.
htmlspecialchars($_POST["third"]).'","'.
htmlspecialchars($_POST["fourth"]).'","'.
htmlspecialchars($_POST["chk1"]).'","'.
htmlspecialchars($_POST["chk2"]).'","'.
htmlspecialchars($_POST["chk3"]).'","'.
$ip.'","'.
$date.
'")');


  if( !mysqli_errno($sql_res) )
  echo '<h1>Ответы добавлены</h1>';
  else {
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