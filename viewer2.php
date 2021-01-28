<?php
function getFriendsList($type, $page)
{
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
$sql='SELECT * FROM std_941.form LIMIT '.$diapazon.', 10';
if ($_GET['sort'] == 'fam')
$sql='SELECT * FROM std_941.form ORDER BY ids LIMIT '.$diapazon.', 10';
if ($_GET['sort'] == 'birth')
$sql='SELECT * FROM std_941.form ORDER BY ids LIMIT '.$diapazon.', 10';
$sql_res=mysqli_query($mysqli, $sql);
$ret='<div style="background-color:#f3f9ec; border-bottom: 4px solid #e38445;" >'; // строка с будущим контентом страницы
while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
{
// выводим каждую запись как строку таблицы
$ret.='<div style="padding:3%;">
<b>Сессия с id '.$row['ids'].'</b><br>
<p>'.$row['qu1'].'</p>
<p>'.$row['qu2'].'</p>
<p>'.$row['qu3'].'</p>
<div class="butons">
<input style="border-radius: 10px;"  type="submit" name="edit" id="edit" class="form-control" value="Редактировать" data-toggle="modal" data-target="#myModal">
<form style="border-radius: 10px;" class="form-control" name="form_updel" method="post" action="">
<input  type="submit" name="del1" id="del" class="form-control" value="Удалить сессию">
<input  type="submit" name="del" id="del" class="form-control" value="Закрыть сессию">
<input style="display:none;" name="numup" class="form-control" value='.$row['ids'].'> </form>
</div>
</div>
<div class="modal" style="z-index:200000000" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        
        <div class="modal-header">
          <h4 class="modal-title">Редактирование отзыва</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        
        <div class="modal-body">
        <form class="form-control" name="form_up" method="post" action="">
        <input name="numup2" class="form-control" value='.$row['ids'].'>
        <label for="nameup">Первый вопрос</label>
        <input class="form-control" type="text" id="nameup" name="nameup" placeholder="">
        <label for="surnameup">Второй вопрос</label>
        <input  class="form-control" id="surnameup" type="text" name="surnameup" placeholder="">
        <label for="documentup">Третий вопрос</label>
        <textarea  class="form-control" id="documentup" type="text" name="documentup" placeholder=""></textarea>
        <label for="4q">Четвертый вопрос</label>
        <input class="form-control" type="text" id="4q" name="chet" placeholder="Четвертый вопрос">
        <label for="5q">Пятый вопрос</label>
        <input class="form-control" type="text" id="5q" name="pat" placeholder="Пятый вопрос">
        <label for="6q">Первый вариант ответа на 5 вопрос</label>
        <input class="form-control" type="text" id="6q" name="shest">
        <label for="7q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="7q" name="sem">
        <label for="8q">Второй вариант ответа на 5 вопрос</label>
        <input class="form-control" type="text" id="8q" name="vosem">
        <label for="9q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="9q" name="devat">
        <label for="10q">Шестой вопрос</label>
        <input class="form-control" type="text" id="10q" name="desat" placeholder="Шестой вопрос">
        <label for="11q">Первый вариант ответа на 6 вопрос</label>
        <input class="form-control" type="text" id="11q" name="odin">
        <label for="12q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="12q" name="dva">
        <label for="13q">Второй вариант ответа на 6 вопрос</label>
        <input class="form-control" type="text" id="13q" name="tri">
        <label for="14q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="14q" name="chet2">
        <label for="15q">Третий вариант ответа на 6 вопрос</label>
        <input class="form-control" type="text" id="15q" name="pat2">
        <label for="16q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="16q" name="shest2">
        <input type="submit" name="buttonupdate" class="form-control" value="Опубликовать" > 
        </form>
        </div>
        
      
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
';


if( isset($_POST['buttonupdate']) && $_POST['buttonupdate']== 'Опубликовать'){
  $numup = $_POST['numup2'];
  $nameup = $_POST['nameup'];
  $surnameup = $_POST['surnameup'];
  $documentup = $_POST['documentup'];
  $chet = $_POST['chet'];
  $pat = $_POST['pat'];
  $shest = $_POST['shest'];
  $sem = $_POST['sem'];
  $vosem = $_POST['vosem'];
  $devat = $_POST['devat'];
  $desat = $_POST['desat'];
  $odin = $_POST['odin'];
  $dva = $_POST['dva'];
  $tri = $_POST['tri'];
  $chet2 = $_POST['chet2'];
  $pat2 = $_POST['pat2'];
  $shest2 = $_POST['shest2'];
  $numup=(int)$_POST['numup2'];
  $nameup = (string)$_POST['nameup'];
  $surnameup = (string)$_POST['surnameup'];
  $documentup = (string)$_POST['documentup'];
  $chet = (string)$_POST['chet'];
  $pat = (string)$_POST['pat'];
  $shest = (string)$_POST['shest'];
  $sem = (int)$_POST['sem'];
  $vosem = (string)$_POST['vosem'];
  $devat = (int)$_POST['devat'];
  $desat = (string)$_POST['desat'];
  $odin = (string)$_POST['odin'];
  $dva = (int)$_POST['dva'];
  $tri = (string)$_POST['tri'];
  $chet2 = (int)$_POST['chet2'];
  $pat2 = (string)$_POST['pat2'];
  $shest2 = (int)$_POST['shest2'];
  $mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
$sql_res=mysqli_query($mysqli,'UPDATE std_941.form SET qu1="'.$nameup.'", qu2="'.$surnameup.'", qu3="'.$documentup.'",qu4="'.$chet.'",qu5="'.$pat.'",qu51="'.$shest.'",qu51b="'.$sem.'", qu52="'.$vosem.'",qu52b="'.$devat.'", qu6="'.$desat.'",qu61="'.$odin.'",qu61b="'.$dva.'",qu62="'.$tri.'",qu62b="'.$chet2.'", qu63="'.$pat2.'", qu63b="'.$shest2.'" WHERE ids='.$numup.'');
$nameup = '';
$surnameup = '';
$documentup = '';
header("Refresh: 0");
};

if( isset($_POST['del'])){
  $numup = $_POST['numup'];
  $numup=(int)$_POST['numup'];
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
  $query ="DELETE FROM form WHERE ids = ".$numup."";
  $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 

  // перенаправление
  header("Refresh: 0");
}
if( isset($_POST['del1'])){
    $numup = $_POST['numup'];
    $numup=(int)$_POST['numup'];
  $mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
    $query ="DELETE FROM results WHERE ids = ".$numup."";
    $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
    $query ="DELETE FROM form WHERE ids = ".$numup."";
  $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
    // перенаправление
    header("Refresh: 0");
  }
  
}
$ret.='</div>'; // заканчиваем формирование таблицы с контентом
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

} 
?>