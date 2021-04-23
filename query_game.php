<?php
session_start();
include('pando_pdoInc.php');
?>

<?php

function show_player_record($row){
    $number = htmlspecialchars($row['player_number']);
	$number = str_replace("\n", "<br>", $number);
	
	$two_PA = htmlspecialchars($row['2PA']);
	$two_PA = str_replace("\n", "<br>", $two_PA);

	$two_PM = htmlspecialchars($row['2PM']);
	$two_PM = str_replace("\n", "<br>", $two_PM);
	
	$three_PA = htmlspecialchars($row['3PA']);
	$three_PA = str_replace("\n", "<br>", $three_PA);

	$three_PM = htmlspecialchars($row['3PM']);
	$three_PM = str_replace("\n", "<br>", $three_PM);

	$FTA = htmlspecialchars($row['FTA']);
	$FTA = str_replace("\n", "<br>", $FTA);

	$FTM = htmlspecialchars($row['FTM']);
	$FTM = str_replace("\n", "<br>", $FTM);

	$OR = htmlspecialchars($row['O_Rebound']);
	$OR = str_replace("\n", "<br>", $OR);

	$DR = htmlspecialchars($row['D_Rebound']);
	$DR = str_replace("\n", "<br>", $DR);

	$AST = htmlspecialchars($row['AST']);
	$AST = str_replace("\n", "<br>", $AST);

	$STL = htmlspecialchars($row['STL']);
	$STL = str_replace("\n", "<br>", $STL);

	$BS = htmlspecialchars($row['BS']);
	$BS = str_replace("\n", "<br>", $BS);

	$TO = htmlspecialchars($row['Turnover']);
	$TO = str_replace("\n", "<br>", $TO);

	$PF = htmlspecialchars($row['PF']);
    $PF = str_replace("\n", "<br>", $PF);

    //得分+總籃板+助攻+抄截+阻攻-（兩分球出手+三分球出手+罰球出手-兩分球進球-三分球進球-罰球進球+失誤）
    $EEF = 2*$two_PM + 3*$three_PM + $OR + $DR + $AST + $STL + $BS - ( $two_PA + $three_PA + $FTA - $two_PM - $three_PM - $FTM + $TO);

    echo '<label id="kk">'.$number.'</label>';
    echo '<label class="label">'.$two_PA.'</label>';
    echo '<label class="label">'.$two_PM.'</label>';
    echo '<label class="label">'.$three_PA.'</label>';
    echo '<label class="label">'.$three_PM.'</label>';
    echo '<label class="label">'.$FTA.'</label>';
    echo '<label class="label">'.$FTM.'</label>';
    echo '<label class="label">'.$OR.'</label>';
    echo '<label class="label">'.$DR.'</label>';
    echo '<label class="label">'.$AST.'</label>';
    echo '<label class="label">'.$STL.'</label>';
    echo '<label class="label">'.$BS.'</label>';
    echo '<label class="label">'.$TO.'</label>';
    echo '<label class="label">'.$PF.'</label>';
    echo '<label class="label">'.$EEF.'</label>';

    $_SESSION['date'] = $row['date'];
    $_SESSION['host'] = $row['host'];
    $_SESSION['guest'] = $row['guest'];
	$_SESSION['place'] = $row['place'];
}
?>

<html lang="en">
	<head>
		<meta charset="utf-8" />

		<title>Pando: query-game</title>
		<meta name="description" content="Figma htmlGenerator" />
		<meta name="author" content="htmlGenerator" />
		<link
			href="https://fonts.googleapis.com/css?family=Avenir&display=swap"
			rel="stylesheet"
		/>

		<link rel="stylesheet" href="query_gamee.css" />
		<style>
			/*
                Figma Background for illustrative/preview purposes only.
                You can remove this style tag with no consequence
              */
			body {
				background: #e5e5e5;
			}
		</style>
	</head>

	<body>
		<div id="e69_3">
			<div id="e82_1303">
				<input type="button" id="e82_1304" value="Home" onclick="self.location.href='./home.php'">
			</div>
			<div id="e82_1306">
				<label class="label">Number</label>
				<label class="label">2-Point Att.</label>
				<label class="label2">2-Point Made</label>
				<label class="label">3-Point Att.</label>
				<label class="label2">3-Point Made</label>
				<label class="label2">FreeThrow Att.</label>
				<label class="label2">FreeThrow Made</label>
				<label class="label2">Offensive Rebound</label>
				<label class="label2">Defensive Rebound</label>
				<label class="label">Assist</label>
				<label class="label">Steal</label>
				<label class="label">Block</label>
				<label class="label">Turnover</label>
				<label class="label">Foul</label>
				<label class="label">EEF</label>


                <?php
                    $sth = $dbh->prepare('
                        SELECT * FROM record as r
                        JOIN player as p ON p.number = r.player_number
                        JOIN game as g ON g.id = r.game_id
						WHERE date = ?
						ORDER BY player_number
                    ');
                    $sth->execute(array($_SESSION['qTime']));
                    if($sth->rowCount() >= 0){
                        while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                            show_player_record($row);
                        }
                    }
                ?>
			</div>
			<div id="e82_1321">
				<div id="e82_1322"></div>
				<div id="e82_1323">
					<div id="e82_1324">
						<span id="ei82_1921_76_11">Guest</span>
						<div id="ei82_1324_82_3"></div>
						<span id="ei82_1324_82_4"><?php echo $_SESSION['guest'];?></span>
					</div>
					<div id="e82_1325">
						<span id="ei82_1921_76_11">Host</span>
						<div id="ei82_1325_76_12"></div>
						<span id="ei82_1325_76_13"><?php echo $_SESSION['host'];?></span>
					</div>
					<div id="place1">
						<span id="place2">Place</span>
						<div id="place3"></div>
						<span id="place4"><?php echo $_SESSION['place'];?></span>
					</div>
					<div id="e82_1921">
						<span id="ei82_1921_76_11">date</span>
						<div id="ei82_1921_76_12"></div>
						<span id="ei82_1921_76_13"><?php echo $_SESSION['date'];?></span>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>