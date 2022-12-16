<?php

include("dbconnection.php");
$deshan = $_SESSION[patientid];


if ($_SERVER["REQUEST_METHOD"] == "POST") {


	$Height=$_POST['height'];
	$HeightUnit=$_POST['heightUnit'];
	$Weight=$_POST['weight'];
	$WeightUnit=$_POST['weightUnit'];
	if($Height == '' || $Weight == '' || $HeightUnit == '' || $WeightUnit == ''){
		$Error = "The input values are required.";
	}
	elseif (filter_var($Height, FILTER_VALIDATE_FLOAT) === false || filter_var($Weight, FILTER_VALIDATE_FLOAT) === false) {
		$Error = "The input value must be a number only.";
	}
	else{
		//Calculation begins from here./
		/*Convert cm to inch -> foot to inch -> meter to inch */
		$HInches = ($HeightUnit=='centimeter')?$Height*0.393701:(($HeightUnit=='foot')?$Height*12:(($HeightUnit=='meter')?$Height*39.3700787:$Height));
		//Convert kg to pound/
		$WPound = ($WeightUnit=='kilogram')?$Weight*2.2:$Weight;
		$BMIIndex = round($WPound/($HInches*$HInches)* 703,2);

	
		if ($BMIIndex < 18.5) {
			$Message="Underweight";
		} else if ($BMIIndex <= 24.9) {
			$Message="Normal";
		} else if ($BMIIndex <= 29.9) {
			$Message="Overweight";
		} else {
			$Message="Obese";
		}
	}
} 












?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BMI Calculator</title>
	<link rel="shortcut icon" href="/images/logo none background2.png" type=image/png>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../asset/app.css">
	<style>
		.BMIChart{
			display: flex;
			align-items: center;
			justify-self: center;
			padding-top: 30px;
		}
	</style>
</head>
<body>
	<!-- Top bar -->
	<div class="container-fluid shadow-sm border-bottom mb-4">
		<div class="row aligh-items-center">
			<div class="col">
				<nav class="navbar navbar-light">
					<a class="btn btn-sm btn-light me-2" href="php-bmi-calculator-demo.zip" title="Download Demo Files"><svg class="svg-icon" viewBox="0 0 24 24">
						<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
						<polyline points="7 10 12 15 17 10"></polyline>
						<line x1="12" y1="15" x2="12" y2="3"></line>
					</svg></a>
			
					<?php if(!isset($_GET['iframe'])){?>
						<a class="btn btn-primary" href="doctoraccount.php" title="W3schools PHP Tutorial" target="_blank">Back</a>
					<?php } ?>


				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<!-- Editor -->
	<div class="container" style="max-width:800px">
		<div class="text-center mb-5">
			<h1 class="fw-bolder mb-0">BMI Calculator</h1>
		</div>
		<form method="post" action="">
			<div class="row justify-content-center" >
				<div class="col">
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 justify-content-center">
						<div class="col text-center mb-3 mb-md-5">
							<label for="height" class="fs-3">Height</label>
							<div class="input-group">
								<input id="height" class="form-control form-control-custom w-50" name="height" type="number" step="any" value="<?php if(!empty($Height)){echo $Height;}?>">
								<select class="form-select w-50" name="heightUnit">
									<option value="centimeter" <?php if(isset($HeightUnit) && $HeightUnit=='centimeter'){echo "selected";}?>>Centimeter</option>
									<option value="inch" <?php if(isset($HeightUnit) && $HeightUnit=='inch'){echo "selected";}?>>Inch</option>
									<option value="foot" <?php if(isset($HeightUnit) && $HeightUnit=='foot' || !isset($HeightUnit)){echo "selected";}?>>Foot</option>
									<option value="meter" <?php if(isset($HeightUnit) && $HeightUnit=='meter'){echo "selected";}?>>Meter</option>
								</select>
							</div>
						</div>
						<div class="col text-center mb-3 mb-md-4">
							<label for="weight" class="fs-3">Weight</label>
							<div class="input-group">
								<input id="weight" class="form-control form-control-custom w-50" name="weight" type="number" step="any" value="<?php if(!empty($Weight)){echo $Weight;}?>">
								<select class="form-select w-50" name="weightUnit">
									<option value="kilogram" <?php if(isset($WeightUnit) && $WeightUnit=='kilogram'){echo "selected";}?>>Kilogram</option>
									<option value="pound" <?php if(isset($WeightUnit) && $WeightUnit=='pound'){echo "selected";}?>>Pound</option>
								</select>
							</div>
						</div>
						<div class="col text-center mb-3 mb-md-4"><input type="submit" name="submit" value="Calculate" class="btn btn-success"></div>
					</div>
				</div>
			</div>
		</form>


		<?php if(isset($BMIIndex) && is_numeric($BMIIndex)){?><!-- Result -->
		<div class="row justify-content-center">
			<div class="col text-center">
				<label for="Result" class="fs-4">Result</label>
				<input id="Result" name="Result" class="form-control form-control-custom" value="<?php echo $BMIIndex.' '.$Message; ?>">
			</div>
		</div>
		<?php } if(isset($Error)){?><!-- Error Messages -->
		<div class="row justify-content-center">
			<div class="col">
				<div class="alert alert-danger shadow-sm" role="alert">Error: <?php echo $Error; ?></div>
			</div>
		</div>

	<?php } ?>
   
</div>
<section>
	<!-- <a class="BMIChart" href="/images/BMIChart.jpg" ></a> -->
	
	<img class="BMIChart" src="/images/BMIChart.png" width="70%" alt="Trulli" style="margin: auto; ">

	
</section>
</body>
</html>