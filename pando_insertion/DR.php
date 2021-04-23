<?php
session_start();
include("../pando_pdoInc.php");
?>

<?php
$number = (int)$_POST["number"];

$sth = $dbh->prepare(
    "SELECT D_Rebound FROM record WHERE ( player_number = ? AND game_id = ? ) "
);
$sth -> execute( array( $number, $_SESSION['game_id'] ));
$row = $sth -> fetch(PDO::FETCH_ASSOC);


$new_record = $row['D_Rebound'] + 1 ;


$sth2 = $dbh->prepare(
    "UPDATE record SET D_Rebound = ? WHERE ( player_number = ? AND game_id = ? )"
  );
$sth2 -> execute( array( $new_record ,$number, $_SESSION['game_id'] ));

echo $new_record;
?>