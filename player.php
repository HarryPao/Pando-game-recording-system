<?php
session_start();
include("pando_pdoInc.php");
?>

<?php
$resultStr = '';

if( isset($_POST['pName']) && isset($_POST['pNumber']) && isset($_POST['pPosition']) ){
        

        $sth2 = $dbh->prepare('SELECT * FROM player WHERE name= ? ');
        $sth2->execute(array($_POST['pName']));
        $row = $sth2->fetch(PDO::FETCH_ASSOC);
        
        if( isset($row['name'])!= "" ){
		   $resultStr = '已存在此球員資料！';
		   echo '<meta http-equiv=REFRESH CONTENT=0;url=player.php>';
        }
        else{
            
            $sth = $dbh->prepare(
			  "INSERT INTO player (name, number, position) VALUES (?, ?, ?)"
			);
			
			/* //for future expansion
            if(isset($_FILES['image'])){
              $fp = fopen($_FILES['image']['tmp_name'], 'rb');
            }
			*/
                $sth->bindParam(1, $_POST['pName']);
                $sth->bindParam(2, $_POST['pNumber']);
                $sth->bindParam(3, $_POST['pPosition']);

                //$sth->bindParam(9, $fp, PDO::PARAM_LOB); //for future expansion

                $dbh->beginTransaction();
                $sth->execute();
                $dbh->commit();
                
                $resultStr = 'Added successfully! Keep adding player or return to Home.';
           
      }      
}

?>

<html lang="en">
	<head>
		<meta charset="utf-8" />

		<title>Pando: Add_Player</title>
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

		<link rel="stylesheet" href="./player.css" />
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
		<form action="player.php" method="POST" enctype="multipart/form-data">
			
			<div id="e132_1786">
				<div id="e132_1787">
					<div id="e132_1788"></div>
					<div id="e149_1763">
						<!--<button name="pSubmit" id="e149_1764">Submit</button>-->
						<input type="submit" id="e149_1764" value="Submit">
					</div>
					<div id="e149_1760">
						<span id="e149_1761">Name</span>
						<input type="text" name="pName" id="e149_1762"></input>
					</div>
					<div id="e149_1754">
						<span id="e149_1755">Number</span>
						<input type="number" name="pNumber" id="e149_1756"></input>
					</div>
					<div id="e149_1757">
						<span id="e149_1758">Position</span>
						<input type="text" name="pPosition" id="e149_1759"></input>
					</div>
					<div id="e132_1795">
						<span id="ei132_1795_9_21">Player</span>
						<div id="ei132_1795_82_22"></div>
					</div>
				</div>
				<div id="e132_1821">
					<!--<button name="pHome" id="e132_1822">Home</button>-->
					<input type="button" value="Home" id="e132_1822" onclick="self.location.href = './home.php' ">
				</div>
			</div>

		</form>
	</body>
</html>