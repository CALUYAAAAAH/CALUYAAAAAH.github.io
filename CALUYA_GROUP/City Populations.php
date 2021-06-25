<!DOCTYPE HTML>
<HTML>
<HEAD>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
	
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">



<STYLE>
	body {
		background-image: url("https://i.pinimg.com/originals/d3/59/1c/d3591c63b81ba14696e290f74743e1de.gif");
		background-size: 1000px, 500px;
	}

	h1 {
		font-family: 'Alfa Slab One', cursive;
		font-size: 80px;
		background-color: ;
		text-align: center;
		color: red;
		letter-spacing: 15px;
		text-shadow: 5px 3px 3px white;
		margin-bottom: 0px;
		margin-top: 0px;
	}

	h2 {
		font-family: 'Fjalla One', sans-serif;
		font-weight: bold;
		text-align:center;
		letter-spacing: 7px;
	}

	.header1{
		font-family: 'Fjalla One', sans-serif;
		background: #4188B1;
		text-align: center;
		color: white;
		margin-top: 1%;
		margin-left: 18%;
		margin-right: 18%;
		border: 3px solid #4188B1;
	}

	.population {
		font-family: 'Varela Round', sans-serif;
		font-size: 20px;
		float:center;
		display: block;
		background: linear-gradient(to right, #F3E5AB, #FFFF,#FFFFE0);		
		color: #4188B1;
		text-align: center;		
		margin-top: 0%;
		margin-left: 18%;
		margin-right: 18%;
		padding-top: 2%;
		padding-bottom: 2%;		
		padding-left: 5%;
		padding-right: 5%;
		border: 5px solid #4188B1;
		letter-spacing: 5px;
	}

	.output {
		font-family: 'Varela Round', sans-serif;
		font-size: 18px;
		float:center;
		display: block;
		background: linear-gradient(to right, #F3E5AB, #FFFF,#FFFFE0);		
		color: #4188B1;
		text-align: center;		
		margin-top: 1%;
		margin-left: 18%;
		margin-right: 18%;
		padding-top: 0%;
		padding-bottom: 1%;		
		padding-left: 5%;
		padding-right: 5%;
		border: 5px solid #4188B1;
		letter-spacing: 5px;
	}
	
	
</STYLE>

</HEAD>

<!-- SPACE -->
<BODY>
<br>
	<div class="header">
		<h1>◌CITY POPULATIONS◌</h1>
	</div>

	<div class="header1">
		<h2>----- POPULATION NUMBER AND GROWTH RATE -----</h2>
	</div>


	<div class="population">
		<form action=" " method="post">
			<label for="ctap"><b>CITY A Population:</b></label>
			<input type="number" placeholder="Input Here..." name="population1" value="<?php if (isset($_POST['population1'])) {echo $_POST['population1'];} ?>" required>
			<br>
			<br>

			<label for="ctagr"><b>CITY A Growth Rate 1:</b></label>
			<input type="number" placeholder="Input Here..." name="rate1" value="<?php if(isset($_POST['rate1'])) {echo $_POST['rate1'];} ?>" required>
			<br>
			<br>

			<label for="ctbp"><b>CITY B Population:</b></label>
			<input type="number" placeholder="Input Here..." name="population2" value="<?php if(isset($_POST['population2'])) {echo $_POST['population2'];} ?>" required>
			<br>
			<br>

			<label for="ctbgr"><b>CITY B Growth Rate:</b></label>
			<input type="number" placeholder="Input Here..." name="rate2" value="<?php if(isset($_POST['rate2'])) {echo $_POST['rate2'];} ?>" required>
			<br><br>

			
			<div class="submit">
				<button type="submit" name="submit" value="SUBMIT" class="btn btn-success btn-lg">SUBMIT</button>
			</div>
		</form>
	</div>

	<div class="output">
		<?php
			$population1 = 0;
			$rate1 = 0;
			$population2 = 0;
			$rate2 = 0;
			$n_years = 0;

			if (isset($_POST['population1']) and isset($_POST['rate1']) and isset($_POST['population2']) and isset($_POST['rate2'])) {
				$population1 = intval($_POST['population1']);
				$rate1 = intval($_POST['rate1']);
				$population2 = intval($_POST['population2']);
				$rate2 = intval($_POST['rate2']);
			}

			if($population1 < $population2) {
				while($population1 < $population2) {
					$population1 += ($rate1 / 100) * $population1;
					$population1 = intval($population1);
					$population2 += ($rate2 / 100) * $population2;
					$population2 = intval($population2);
					$n_years++;
				}
				$population1 = number_format($population1);
				$population2 = number_format($population2);
				echo "<br>";
				echo "City A: ", $population1, "<br>";
				echo "City B: ", $population2, "<br>";
				echo "<br>";
				echo "The population of City A will be greater than or the same City B in ", $n_years, " years";
			}

			else {
				$population1 = number_format($population1);
				$population2 = number_format($population2);
				echo "<br>";
				echo "City A: ", $population1, "<br>";
				echo "City B: ", $population2, "<br>";
				echo "<br>", "Please input Population and Rate...";
			}
		?>
	</div>

	<br><br><br><br>
</BODY>
</HTML>
