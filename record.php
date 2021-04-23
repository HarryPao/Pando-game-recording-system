<?php
session_start();
include("pando_pdoInc.php");
?>

<?php   

function show_player_column($row){
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
	
	
	echo '<label class="label1">'.$number.'</label>';
	echo '<input type="button" id = "two_PA:'.$number.'" class="button" value="'.$two_PA.'" onclick="two_PA('.$number.');">';
	echo '<input type="button" id = "two_PM:'.$number.'" class="button" value="'.$two_PM.'" onclick="two_PM('.$number.');">';
	echo '<input type="button" id = "three_PA:'.$number.'" class="button" value="'.$three_PA.'" onclick="three_PA('.$number.');">';
	echo '<input type="button" id = "three_PM:'.$number.'" class="button" value="'.$three_PM.'" onclick="three_PM('.$number.');">';
	echo '<input type="button" id = "FTA:'.$number.'" class="button" value="'.$FTA.'" onclick="FTA('.$number.');">';
	echo '<input type="button" id = "FTM:'.$number.'" class="button" value="'.$FTM.'" onclick="FTM('.$number.');">';
	echo '<input type="button" id = "OR:'.$number.'" class="button" value="'.$OR.'" onclick="OR('.$number.');">';
	echo '<input type="button" id = "DR:'.$number.'" class="button" value="'.$DR.'" onclick="DR('.$number.');">';
	echo '<input type="button" id = "AST:'.$number.'" class="button" value="'.$AST.'" onclick="AST('.$number.');">';
	echo '<input type="button" id = "STL:'.$number.'" class="button" value="'.$STL.'" onclick="STL('.$number.');">';
	echo '<input type="button" id = "BS:'.$number.'" class="button" value="'.$BS.'" onclick="BS('.$number.');">';
	echo '<input type="button" id = "TO:'.$number.'" class="button" value="'.$TO.'" onclick="TO('.$number.');">';
	echo '<input type="button" id = "PF:'.$number.'" class="button" value="'.$PF.'" onclick="PF('.$number.');">';
}

?>


<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<title>Pando: Record</title>
		<meta name="description" content="Figma htmlGenerator" />
		<meta name="author" content="htmlGenerator" />
		<link
			href="https://fonts.googleapis.com/css?family=Avenir&display=swap"
			rel="stylesheet"
		/>

		<link rel="stylesheet" href="./record_ver2.css"/>
		<style>
			body {
				background: #e5e5e5;
			}
		</style>
	</head>

	<body>
		<script>
			function two_PA(player_number){
				$.post(
					"pando_insertion/two_PA.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("two_PA:"+player_number);
						i.value = new_record;
					}
				);
			}

			function two_PM(player_number){
				$.post(
					"pando_insertion/two_PM.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("two_PM:"+player_number);
						i.value = new_record;
					}
				);
			}

			function three_PA(player_number){
				$.post(
					"pando_insertion/three_PA.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("three_PA:"+player_number);
						i.value = new_record;
					}
				);
			}

			function three_PM(player_number){
				$.post(
					"pando_insertion/three_PM.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("three_PM:"+player_number);
						i.value = new_record;
					}
				);
			}

			function FTA(player_number){
				$.post(
					"pando_insertion/FTA.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("FTA:"+player_number);
						i.value = new_record;
					}
				);
			}

			function FTM(player_number){
				$.post(
					"pando_insertion/FTM.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("FTM:"+player_number);
						i.value = new_record;
					}
				);
			}

			function OR(player_number){
				$.post(
					"pando_insertion/OR.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("OR:"+player_number);
						i.value = new_record;
					}
				);
			}

			function DR(player_number){
				$.post(
					"pando_insertion/DR.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("DR:"+player_number);
						i.value = new_record;
					}
				);
			}

			function AST(player_number){
				$.post(
					"pando_insertion/AST.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("AST:"+player_number);
						i.value = new_record;
					}
				);
			}

			function STL(player_number){
				$.post(
					"pando_insertion/STL.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("STL:"+player_number);
						i.value = new_record;
					}
				);
			}

			function BS(player_number){
				$.post(
					"pando_insertion/BS.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("BS:"+player_number);
						i.value = new_record;
					}
				);
			}

			function TO(player_number){
				$.post(
					"pando_insertion/TO.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("TO:"+player_number);
						i.value = new_record;
					}
				);
			}

			function PF(player_number){
				$.post(
					"pando_insertion/PF.php",
					{
						number: player_number
					},
					function(new_record){
						let i = document.getElementById("PF:"+player_number);
						i.value = new_record;
					}
				);
			}
		</script>



		<div id="e9_26">
			<div id="e10_30">
				<input type="button" name="endGame" id="e10_31" value="End Game" onclick="self.location.href='./home.php'">
			</div>
			<div id="e73_1226">
				
                <label class="label">Number</label>
				<label class="label">2PA</label>
				<label class="label">2PM</label>
				<label class="label">3PA</label>
				<label class="label">3PM</label>
				<label class="label">FTA</label>
				<label class="label">FTM</label>
				<label class="label">OR</label>
				<label class="label">DR</label>
				<label class="label">AST</label>
				<label class="label">STL</label>
				<label class="label">BS</label>
				<label class="label">TO</label>
				<label class="label">PF</label>
				
				<form>
				<?php
				$sth3 = $dbh->prepare('SELECT number FROM player');
				$sth3 -> execute(array());
				if($sth3->rowCount() >= 0){
					
					while($row = $sth3->fetch(PDO::FETCH_ASSOC)){
						
						$sth4 = $dbh->prepare('SELECT * FROM record WHERE game_id=? AND player_number=?');
						$sth4 -> execute(array($_SESSION['game_id'], $row['number']));
						$temp = $sth4->fetch(PDO::FETCH_ASSOC);
						if(isset($temp['player_number']) ==''){

							$sth2 = $dbh->prepare('
								INSERT INTO record (game_id, player_number) 
								VALUES (?,?)
							');
							$sth2 -> execute(array($_SESSION['game_id'],$row['number']));
						}
					}
				}
                $sth = $dbh->prepare('SELECT * from record WHERE game_id = ? ORDER BY player_number ');
                $sth->execute(array((int)$_SESSION['game_id']));
                
                if($sth->rowCount() >=0){
                    while($row = $sth->fetch(PDO::FETCH_ASSOC)){
						show_player_column($row);               
                    }
				}
				                
				?>
				</form>

			</div>

			<div id="e82_70"></div>
			<div id="e82_72">
				<div id="e82_1">
					<label id="e82_2">Guest</label>
					<div id="e82_3"></div>
					<label id="e82_4"><?php echo $_SESSION['guest'];?></label>
				</div>
				<div id="e76_10">
					<label id="e76_11">Host</label>
					<div id="e76_12"></div>
					<label id="e76_13"><?php echo $_SESSION['host'];?></label>
				</div>
				<div id="e100_2283">
					<span id="e100_2284">Time</span>
					<div id="e100_2285"></div>
					<label id="e100_2286"><?php echo $_SESSION['date'];?></label>
				</div>
				<div id="e100_2291">
					<label id="e100_2292">Place</label>
					<div id="e100_2293"></div>
					<label id="e100_2294"><?php echo $_SESSION['place'];?></label>
				</div>
			</div>
			<div id="e69_61">
				<button name="undo" id="e69_62">Undo</button>
			</div>
		</div>
	</body>
</html>

