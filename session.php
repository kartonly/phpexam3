    <?
    session_start();
    include 'viewer.php'; 
// подключаеммодульсбиблиотекойфункций
// есливпараметрахнеуказанатекущаястраница – выводимсамуюпервую
if( !isset($_GET['pg']) || $_GET['pg']<0 ) $_GET['pg']=0; 
// есливпараметрахнеуказантипсортировкиилионнедопустим
if(!isset($_GET['sort']) || ($_GET['sort']!='byid' && $_GET['sort']!='fam' &&     $_GET['sort']!='birth'))  $_GET['sort']='byid'; 
// устанавливаемсортировкупоумолчанию// формируемконтентстраницыспомощьюфункцииивыводимего
echo getFriendsList($_GET['sort'], $_GET['pg']); 

    $mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
// если были переданы данные для добавления в БД
    $message = 'Вы в тесте';
    if ($_SERVER["REQUEST_METHOD"] == "POST"):
      $ip = (string)$_SERVER['REMOTE_ADDR'];
      $first = (string)($_POST["first"]);
      $second = (string)$_POST["second"];
      $third = (string)($_POST["third"]);
      $fourth = (string)$_POST["fourth"];
      $choice = (string)($_POST["choice"]);
      $chk1 = (string)$_POST["chk1"];
      $chk2 = (string)$_POST["chk2"];
      $chk3 = (string)$_POST["chk3"];
      if( isset($_POST['buttonupdate']))
{
$pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.results');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO std_941.results(first, second, third, fourth, choice, chk1, chk2, chk3, id, ids) VALUES ("'.$first.','.$second.','.$third.','.$fourth.','.$choice.','.$chk1.','.$chk2.','.$chk3.','.$ip.','.$id.'")');
 }
      if(empty($first)):
          $message = 'Поле `ваш первый вопрос` обязательно к заполнению!';
      elseif(empty($second)):
          $message = 'Поле `Ваш второй вопрос` обязательно к заполнению!';
      elseif(empty($third)):
            $message = 'Поле `Ваш третий вопрос` обязательно к заполнению!';
      elseif(empty($fourth)):
            $message = 'Поле `Ваш четвертый вопрос` обязательно к заполнению!';
      // Если поля заполнены, записываем в сессию
      else:
          $_SESSION["first"] = $first;
          $_SESSION["second"] = $second;
          $_SESSION["third"] = $third;
          $_SESSION["fourth"] = $fourth;
          $_SESSION["choice"] = $choice;
          $_SESSION["chk1"] = $chk1;
          $_SESSION["chk2"] = $chk3;
          $_SESSION["chk3"] = $chk3;
          if( isset($_POST['buttonupdate']))
{
$pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.results');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO std_941.results(first, second, third, fourth, choice, chk1, chk2, chk3,  ids) VALUES ("'.$_SESSION["first"].','.$_SESSION["second"].','.$_SESSION["third"].','.$_SESSION["fourth"].','.$_SESSION["choice"].','.$_SESSION["chk1"].','.$_SESSION["chk2"].','.$_SESSION["chk3"].','.$id.'")');
 }
      endif;
     
    // Иначе берём данные из сессии
    else:
        $first = $_SESSION["first"] ?? null;
        $second = $_SESSION["second"] ?? null;
        $third = $_SESSION["third"] ?? null;
        $fourth = $_SESSION["fourth"] ?? null;
        $choice = $_SESSION["choice"] ?? null;
        $chk1 = $_SESSION["chk1"] ?? null;
        $chk2 = $_SESSION["chk2"] ?? null;
        $chk3 = $_SESSION["chk3"] ?? null;
        if( isset($_POST['buttonupdate']))
{
$pre_id=mysqli_query($mysqli, 'SELECT * FROM std_941.results');
$id=mysqli_num_rows($pre_id)+1;
$sql_res=mysqli_query($mysqli,'INSERT INTO std_941.results(first, second, third, fourth, choice, chk1, chk2, chk3, ids) VALUES ("'.$first.','.$second.','.$third.','.$fourth.','.$choice.','.$chk1.','.$chk2.','.$chk3.','.$id.'")');
 }
    endif;
    
 
    ?>
