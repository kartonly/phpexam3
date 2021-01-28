<?php
function getFriendsList($type, $page)
{
// осуществляем подключение к базе данных
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
if( mysqli_connect_errno() ) // проверяем корректность подключения
return 'Ошибка подключения к БД: '.mysqli_connect_error();
// формируем и выполняем SQL-запрос для определения числа записей
$sql_res=mysqli_query($mysqli, 'SELECT COUNT(*) FROM std_941.results');
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
$sql='SELECT * FROM std_941.results LIMIT '.$diapazon.', 10';
if ($_GET['sort'] == 'fam')
$sql='SELECT * FROM std_941.results ORDER BY ids LIMIT '.$diapazon.', 10';
if ($_GET['sort'] == 'birth')
$sql='SELECT * FROM std_941.results ORDER BY ids LIMIT '.$diapazon.', 10';
$sql_res=mysqli_query($mysqli, $sql);




$summa='SELECT SUM(choice) AS value_sum FROM std_941.results ORDER BY ids';
$summa_res=mysqli_query($mysqli, $summa);

while ($row2 = mysqli_fetch_assoc($summa_res)){echo 'Среднее значение баллов '.$row2['value_sum']; }



$ret='<table style="border:2px solid black;">'; // строка с будущим контентом страницы
while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
{
    $summ=$row['chk1']+$row['chk2']+$row['chk3']+$row['choice'];
// выводим каждую запись как строку таблицы
$ret.='
<tr>
    <th>1 Ответ</th>
    <th>2 Ответ</th>
    <th>3 Ответ</th>
    <th>4 Ответ</th>
    <th>Выбранный вариант</th>
    <th>Вариант 1</th>
    <th>Варинат 2</th>
    <th>Вариант 3</th>
    <th>ID сессии</th>
    <th>ID ответа</th>
    <th>Заработанно баллов</th>
   </tr>

<tr style="border:2px solid black;"><td>'.$row['first'].'</td>
<td>'.$row['second'].'</td>
<td>'.$row['third'].'</td>
<td>'.$row['fourth'].'</td>
<td>'.$row['choice'].'</td>
<td>'.$row['chk1'].'</td>
<td>'.$row['chk2'].'</td>
<td>'.$row['chk3'].'</td>
<td>'.$row['ids'].'</td>
<td>'.$row['id'].'</td>
<td>'.$summ.'</td></tr>';
}
$ret.='</table>'; // заканчиваем формирование таблицы с контентом
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