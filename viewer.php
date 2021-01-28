


<?php
function getFriendsList($type, $page)
{
echo '
Введите id сессии<br>
<form class="form-control" name="form_id" method="post" action="">
<input name="id" id="id">
<input type="submit" name="button" class="form-control" value="Ну ка посмотрим"> 
</form>
';
if( isset($_POST['button']) && $_POST['button']== 'Ну ка посмотрим')
{ 
if (isset($_POST['id'])){
$id = (int)$_POST['id'];
// осуществляем подключение к базе данных
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
if( mysqli_connect_errno() ) // проверяем корректность подключения
return 'Ошибка подключения к БД: '.mysqli_connect_error();
// формируем и выполняем SQL-запрос для определения числа записей
$sql_res=mysqli_query($mysqli, 'SELECT COUNT(*) FROM std_941.form');
// проверяем корректность выполнения запроса и определяем его результат
if( !mysqli_errno($mysqli) && $row=mysqli_fetch_row($sql_res) )
{
if( !$TOTAL=$row[0] ) // если в таблице нет записей
return 'В таблице нет данных'; // возвращаем сообщение
$PAGES = ceil($TOTAL/10);// вычисляем общее количество страниц
if( $page>=$PAGES ) // если указана страница больше максимальной
$page=$TOTAL-1; // будем выводить последнюю страницу
$diapazon=$page*10;
if ($_GET['sort'] == 'byid')// формируем и выполняем SQL-запрос для выборки записей из БД
$sql='SELECT * FROM std_941.form WHERE ids='.$id.' LIMIT '.$diapazon.', 1';
if ($_GET['sort'] == 'fam')
$sql='SELECT * FROM std_941.form  WHERE ids='.$id.' ORDER BY qu1 LIMIT '.$diapazon.', 1';
if ($_GET['sort'] == 'birth')
$sql='SELECT * FROM std_941.form  WHERE ids='.$id.' ORDER BY qu1 LIMIT '.$diapazon.', 1';
$sql_res=mysqli_query($mysqli, $sql);

while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
{
$row['isclose'];
if ($row['isclose']==1){
  echo 'Сессия была закрыта';
}
else{
$ret='
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
<h1>Заполните форму</h1>
<p><a href="destroy.php">Закрыть сессию</a></p>'; // строка с будущим контентом страницы

$ret.='
<form class="form-control" name="form_sess" method="post" action="">
<label for="first">'.$row['qu1'].'</label>
<input class="form-control" type="text" id="first" name="first" placeholder="Первый вопрос">
<label for="second">'.$row['qu2'].'</label>
<input class="form-control" type="text" id="first" name="second" placeholder="Второй вопрос">
<label for="third">'.$row['qu3'].'</label>
<input class="form-control" type="text" id="third" name="third" placeholder="Третий вопрос">
<label for="fourth">'.$row['qu4'].'</label>
<textarea class="form-control" type="text" id="fourth" name="fourth" placeholder="Четвертый вопрос"></textarea>
<label>'.$row['qu5'].'</label>
<input class="form-control" type="radio" id="Choice1" name="choice" value="'.$row['qu51b'].'">
<label for="Choice1">'.$row['qu52'].'</label>
<input class="form-control" type="radio" id="Choice2" name="choice" value="'.$row['qu52b'].'">
<label for="Choice2">'.$row['qu52'].'</label>
<label>'.$row['qu6'].'</label>
<input class="form-control" type="checkbox" id="chk1" name="chk1" value="'.$row['qu61b'].'">
  <label for="chk1">'.$row['qu61'].'</label>
  <input class="form-control" type="checkbox" id="chk2" name="chk2" value="'.$row['qu62b'].'">
  <label for="chk3">'.$row['qu62'].'</label>
  <input class="form-control" type="checkbox" id="chk3" name="chk3" value="'.$row['qu63b'].'">
  <label for="chk1">'.$row['qu63'].'</label>
  <input type="submit" name="buttonupdate" class="form-control" value="Отправить форму" > </form>
';
}


$ret.='</body></html>'; // заканчиваем формирование таблицы с контентом
if( isset($_POST['buttonupdate']))
{ 
$ids=(int)($_POST["id"]);
$first = (string)($_POST["first"]);
$second = (string)$_POST["second"];
$third = (string)($_POST["third"]);
$fourth = (string)$_POST["fourth"];
$choice = (string)($_POST["choice"]);
$chk1 = (string)$_POST["chk1"];
$chk2 = (string)$_POST["chk2"];
$chk3 = (string)$_POST["chk3"];
  // формируем и выполняем SQL-запрос для добавления записи
$pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.results');
$id=2;
$sql_res=mysqli_query($mysqli,'INSERT INTO std_941.results (first, second, third, fourth, choice, chk1, chk2, chk3, ids, id) VALUES ("'.
(string)($_POST["first"]).'","'.
(string)$_POST["second"].'", "'.
(string)($_POST["third"]).'", "'.
(string)$_POST["fourth"].'", "'.
(string)($_POST["choice"]).'", "'.
(string)$_POST["chk1"].'", "'.
(string)$_POST["chk2"].'", "'.
(string)$_POST["chk3"].'", "'.
$id.'", "'.
(int)($_POST["id"]).
'")');
header("Refresh: 0");}


if( $PAGES>1 ) // если страниц больше одной – добавляем пагинацию
{
$ret.='<div id="pages">Выберите страницу: '; // блок пагинации
for($i=0; $i<$PAGES; $i++) // цикл для всех страниц пагинации
if( $i != $page ) // если не текущая страница
$ret.='<a href="?p=viewer&pg='.$i.'&sort='.$_GET['sort'].'"> '.($i+1).'</a>';
else // если текущая страница
$ret.='<span> '.($i+1).'</span>';
$ret.='</div>';
}
return $ret; // возвращаем сформированный контент
}
// если запрос выполнен некорректно
return 'Неизвестная ошибка'; // возвращаем сообщение
if( isset($_POST['buttonupdate']))
{ 
$ids=(int)($_POST["id"]);
$first = (string)($_POST["first"]);
$second = (string)$_POST["second"];
$third = (string)($_POST["third"]);
$fourth = (string)$_POST["fourth"];
$choice = (string)($_POST["choice"]);
$chk1 = (string)$_POST["chk1"];
$chk2 = (string)$_POST["chk2"];
$chk3 = (string)$_POST["chk3"];
  // формируем и выполняем SQL-запрос для добавления записи
$pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.results');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO std_941.results(first, second, third, fourth, choice, chk1, chk2, chk3, ids, id) VALUES ("'.
(string)($_POST["first"]).'","'.
(string)$_POST["second"].'", "'.
(string)($_POST["third"]).'", "'.
(string)$_POST["fourth"].'", "'.
(string)($_POST["choice"]).'", "'.
(string)$_POST["chk1"].'", "'.
(string)$_POST["chk2"].'", "'.
(string)$_POST["chk3"].'", "'.
$id.'", "'.
(int)($_POST["id"]).
'")');
header("Refresh: 0");}
} }
}}

?>
