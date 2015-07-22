<?php
/**
 * 在给定的67种元素中，任意输入几种元素及其对应的原子个数，计算Sigma参数的值
 */



// 合金中可能的元素的映射
$elementsMapping = array(
	'Li' => 1,   'Be' => 2,   'B'  => 3,   'C'  => 4,   'N'  => 5,   'Na' => 6,   'Mg' => 7,   'Al' => 8,   'Si' => 9,   'P'  => 10,
	'K'  => 11,  'Ca' => 12,  'Sc' => 13,  'Ti' => 14,  'V'  => 15,  'Cr' => 16,  'Mn' => 17,  'Fe' => 18,  'Co' => 19,  'Ni' => 20,
	'Cu' => 21,  'Zn' => 22,  'Ga' => 23,  'Ge' => 24,  'Rb' => 25,  'Sr' => 26,  'Y'  => 27,  'Zr' => 28,  'Nb' => 29,  'Mo' => 30,
	'Tc' => 31,  'Ru' => 32,  'Rh' => 33,  'Pd' => 34,  'Ag' => 35,  'Cd' => 36,  'In' => 37,  'Sn' => 38,  'Cs' => 39,  'Ba' => 40,
	'La' => 41,  'Ce' => 42,  'Pr' => 43,  'Nd' => 44,  'Pm' => 45,  'Sm' => 46,  'Eu' => 47,  'Gd' => 48,  'Tb' => 49,  'Dy' => 50,
	'Ho' => 51,  'Er' => 52,  'Tm' => 53,  'Yb' => 54,  'Lu' => 55,  'Hf' => 56,  'Ta' => 57,  'W'  => 58,  'Re' => 59,  'Os' => 60,
	'Ir' => 61,  'Pt' => 62,  'Au' => 63,  'Tl' => 64,  'Pb' => 65,  'Th' => 66,  'U'  => 67,
);

// 各元素对应的原子半径
$radium = array(
	 1 => 151.94,   2 => 112.8,    3 => 82,      4 => 77.3,     5 => 75,       6 => 185.7,    7 => 160.13,   8 => 143.17,   9 => 115.3,   10 => 106,
	11 => 231,     12 => 197.6,   13 => 164.1,  14 => 146.15,  15 => 131.6,   16 => 124.91,  17 => 135,     18 => 124.12,  19 => 125.1,   20 => 124.59,
	21 => 127.8,   22 => 139.45,  23 => 139.2,  24 => 124,     25 => 244,     26 => 215.2,   27 => 180.15,  28 => 160.25,  29 => 142.9,   30 => 136.26,
	31 => 136,     32 => 133.84,  33 => 134.5,  34 => 137.54,  35 => 144.47,  36 => 156.83,  37 => 165.9,   38 => 162,     39 => 265,     40 => 217.6,
	41 => 187.9,   42 => 182.47,  43 => 165,    44 => 164,     45 => 163,     46 => 181,     47 => 198.44,  48 => 180.13,  49 => 178.14,  50 => 177.4,
	51 => 176.61,  52 => 175.58,  53 => 156,    54 => 170,     55 => 173.49,  56 => 157.75,  57 => 143,     58 => 136.7,   59 => 137.5,   60 => 135.23,
	61 => 135.73,  62 => 138.7,   63 => 144.2,  64 => 171.6,   65 => 174.97,  66 => 180,     67 => 142
);

if ( !empty($_POST['element']) && !empty($_POST['number']) ) {
	$elementsArr = explode(',', trim($_POST['element'],','));
	$numbersArr = explode(',', trim($_POST['number'],','));

	if (count($elementsArr) != count($numbersArr)) {
		echo "Error input, please try again!";
		header('Location:');
		exit;
	}

	foreach ($elementsArr as $key => $value) {
		$elementsArr[$key] = trim($value);
	}
	foreach ($numbersArr as $key => $value) {
		$numbersArr[$key] = trim($value);
	}

	foreach ($elementsArr as $value){
		$maps[] = $elementsMapping[$value];
	}

	$total = array_sum($numbersArr);

	foreach ($numbersArr as $value){
		$C[] = $value/$total;
	}

	// 各原子的平均半径
	$averageR = 0;
	for ($i=0; $i<count($maps); $i++) {
		$averageR += $C[$i] * $radium[$maps[$i]];
	}
	
	$sigmaSquare = 0;
	for ($i=0; $i <count($maps) ; $i++) {
		$temp = 1 - $radium[$maps[$i]] / $averageR;
		$sigmaSquare += $C[$i] * pow($temp,2);
	}
	
	$sigma =  sqrt($sigmaSquare);

	echo "<p style='color:red'>The value is $sigma </p><br/>";
}
?>


<html>
	<body>
		<form name="input" method="post" >
			Input the elements consist of the alloy(separated by commas):<br/>
			For example:<br/>
			Na, Mg, Al, Au, Ag, Cu<br/>
			<input type="text" name="element" style="width:500px;height:30px"><br/><br/>
			Input the number of each kind of elements(separated by commas):<br/>
			For example:<br/>
			1, 2, 1, 1, 1, 1<br/>
			<input type="text" name="number"style="width:500px;height:30px"><br/><br/>
			<input type="submit" value="Submit" />
		</form>
	</body>

</html>