<?php
session_start();
include("pando_pdoInc.php");
?>
 
 <?php
 
$resultStr = '';

if( isset($_POST['rTime']) && isset($_POST['rPlace']) && isset($_POST['rHost']) && isset($_POST['rGuest']) ){
        

        $sth2 = $dbh->prepare('SELECT * FROM game WHERE (date= ? AND place=? AND host=? AND guest=?)');
        $sth2->execute(array($_POST['rTime'], $_POST['rPlace'], $_POST['rHost'], $_POST['rGuest']));
        $row = $sth2->fetch(PDO::FETCH_ASSOC);
        
        if( isset($row['guest'])!= "" ){
		   $resultStr = '比賽資料衝突！';
			echo $resultStr;
			echo '<meta http-equiv=REFRESH CONTENT=0;url=home.php>';
        }
        else{
            
            $sth = $dbh->prepare(
			  "insert into game (date, place, host, guest) values (?, ?, ?, ?)"
			);
			
                $sth->bindParam(1, $_POST['rTime']);
                $sth->bindParam(2, $_POST['rPlace']);
				$sth->bindParam(3, $_POST['rHost']);
				$sth->bindParam(4, $_POST['rGuest']);

                $dbh->beginTransaction();
                $sth->execute();
                $dbh->commit();
				
				$_SESSION['date'] = $_POST['rTime'];
				$_SESSION['place'] = $_POST['rPlace'];
				$_SESSION['host'] = $_POST['rHost'];
				$_SESSION['guest'] = $_POST['rGuest'];
				
				$resultStr = 'Added successfully! Begin your recording!';
				
				$sth3 = $dbh->prepare('SELECT * FROM game WHERE (date= ? AND place=? AND host=? AND guest=?)');
				$sth3->execute(array($_POST['rTime'], $_POST['rPlace'], $_POST['rHost'], $_POST['rGuest']));
				$row = $sth3->fetch(PDO::FETCH_ASSOC);
				
				$_SESSION['game_id'] = $row['id'];

				echo '<meta http-equiv=REFRESH CONTENT=0;url=record.php>';
      }      
}


if( isset($_POST['qTime']) && isset($_POST['qPlayer']) ){
	if( $_POST['qTime']!=null && $_POST['qPlayer']!=null ){
		$_SESSION['qTime'] = $_POST['qTime'];
		$_SESSION['qPlayer'] = $_POST['qPlayer'];
		echo '<meta http-equiv=REFRESH CONTENT=0;url=query_player_in_game.php>';
	}elseif( $_POST['qPlayer']==null ){
		$_SESSION['qTime'] = $_POST['qTime'];
		echo '<meta http-equiv=REFRESH CONTENT=0;url=query_game.php>';
	}else{
		$_SESSION['qPlayer'] = $_POST['qPlayer'];
		echo '<meta http-equiv=REFRESH CONTENT=0;url=query_player.php>';
	}
}
?>

<html lang="en">
	<head>
		<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Pando: Home</title>
		<meta name="description" content="Figma htmlGenerator" />
		<meta name="author" content="htmlGenerator" />
		
		<link
			href="https://fonts.googleapis.com/css?family=Avenir+Next&display=swap"
			rel="stylesheet"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Avenir&display=swap"
			rel="stylesheet"
		/>

		<link rel="stylesheet" href="./home.css" />
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
		
		<div class="container" id="e8_72">
			<form action="home.php" method="POST" enctype="multipart/form-data">
				<div id="e82_26">
					<div id="e9_7"></div>
					<div id="e82_24">
						<input type="submit" name="rSubmit" id="e9_23" value="Submit">
					</div>
					<div id="e82_20">
						<div id="e82_7">
							<span id="e9_13">Time</span>
							<input type="date" name="rTime" id="e9_14"></input>
						</div>
						<div id="e82_8">
							<span id="ei82_8_9_13">Place</span>
							<input type="text" name="rPlace" id="ei82_8_9_14"></input>
						</div>
						<div id="e82_11">
							<span id="ei82_11_9_13">Host</span>
							<input type="text" name="rHost" id="ei82_11_9_14"></input>
						</div>
						<div id="e82_12">
							<span id="ei82_12_9_13">Guest</span>
							<input type=""text name="rGuest" id="ei82_12_9_14"></input>
						</div>
					</div>
					<div id="e82_25">
						<span id="e9_21">Record</span>
					</div>
				</div>
			</form>

			<form action="home.php" method="POST" enctype="multipart/form-data">				
				<div id="e82_28"></div>
				<div id="e82_29">
					<input type="submit" name="qSunmit" id="ei82_29_9_23" value="Submit">
				</div>
				<div id="e82_56">
					<span id="e82_57">Time</span>
					<input type="date" name="qTime" id="e82_58"></input>
				</div>
				<div id="e82_67">
					<span id="ei82_67_82_57">Player</span>
					<input type="text" name="qPlayer" id="ei82_67_82_58"></input>
				</div>
				<div id="e82_48">
					<span id="e82_54">Query</span>
					<div id="e82_55"></div>
				</div>
			</form>

			<div id="e82_50">
					<input type="button" name="Addplayer" id="e9_button" value="Add Players" onclick="self.location.href='./player.php' ">
			</div>
			
		</div>
		
	</body>
</html>