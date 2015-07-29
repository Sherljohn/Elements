<?php
/**
 * 在给定的67种元素中，任意输入几种元素及其对应的原子个数，计算Gma参数的值
 */



// 合金中可能的元素的映射
include './data/elementsMappingReverse.php';

// 各元素对应的原子半径
include './data/radium.php';

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
	
	//每种元素的原子半径
	for ($i=0; $i<count($maps); $i++) {
	    $elementsRadium[] = $radium[$maps[$i]];
	}
	
	//对原子半径进行排序，获取最小的原子半径和最大的原子半径
	sort($elementsRadium);
	$rs = $elementsRadium[0];
	$rl = $elementsRadium[count($elementsRadium)-1];
	
	
	//计算ws的值
	$ws = (pow(($rl+$averageR), 2) - pow($averageR, 2)) / pow(($rl+$averageR), 2);
	$ws = 1 - sqrt($ws);
	
	//计算wl的值
	$wl = (pow(($rs+$averageR), 2) - pow($averageR, 2)) / pow(($rs+$averageR), 2);
	$wl = 1 - sqrt($wl);
	
	$gma = $wl/$ws;
	

	echo "<p style='color:red'>The value of Gma is $gma </p><br/>";
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