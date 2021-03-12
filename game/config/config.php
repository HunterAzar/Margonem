<?php
$host = 'localhost';
$player = 'root';
$pass = '';
$db = 'margonem';

$connect = @mysqli_connect($host, $player, $pass) or die('socket error - no connect');
if(is_string($connect)){
    echo("Błąd łączenia z DB");
    echo(mysqli_errno($connect));
}
@mysqli_select_db($connect,$db) or die('socket error - no db');
@mysqli_query($connect,"SET NAMES 'utf8-polish-ci'");

session_start();
if(isset($_SESSION['player'])){
    $player = @mysqli_fetch_array(@mysqli_query($connect,"select * from player where id = '".$_SESSION['player']."' limit 1"));
    printf($player['mapa']);
    $mapa = @mysqli_fetch_array(@mysqli_query($connect,"select * from mapa where id = ".$player['mapa']." limit 1"));
}

?>