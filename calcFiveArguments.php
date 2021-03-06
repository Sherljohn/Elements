<?php
/**
 * 在给定的67种元素中，任意输入几种元素及其对应的原子个数，计算Omega参数的值
 */



// 合金中可能的元素的映射
include './data/elementsMappingReverse.php';

// 各元素对应的原子半径
include './data/radium.php';

// 各元素对应的熔点
include './data/meltingPoint.php';

// 各元素两两之间的混合焓
include './data/deltaH.php';	


if ( !empty($_POST['element']) && !empty($_POST['number']) ) {
	$elementsArr = explode(',', trim($_POST['element'], ','));
	$numbersArr  = explode(',', trim($_POST['number'], ','));
	
	if (count($elementsArr) != count($numbersArr)) {
		echo "Error input, please try again!";
		header('Location:');
		exit;
	}

	// 删除对于的空格
	foreach ($elementsArr as $key => $value) {
		$elementsArr[$key] = trim($value);
	}
	foreach ($numbersArr as $key => $value) {
		$numbersArr[$key] = trim($value);
	}

	// 把元素转化为对应的数字表示(67个数组分别代表67种不同的元素，一一对应)
	foreach ($elementsArr as $value){
		$maps[] = $elementsMapping[$value];
	}

	// 计算每种元素的原子百分比
	$total = array_sum($numbersArr);
	foreach ($numbersArr as $value){
		$C[] = $value/$total;
	}

	// 计算平均半径
	$averageR = 0;
	for ($i=0; $i<count($maps); $i++) {
		$averageR += $C[$i] * $radium[$maps[$i]];
	}


	//========================== sigma ===================================
	$sigmaSquare = 0;
	for ($i=0; $i <count($maps) ; $i++) {
		$temp = 1 - $radium[$maps[$i]] / $averageR;
		$sigmaSquare += $C[$i] * pow($temp,2);
	}
	$sigma =  sqrt($sigmaSquare);
	
	echo "<p style='color:red'><b>Sigma</b> : $sigma </p>";
	//========================== sigma ===================================

	
	//======================== deltaHmix =================================
	$deltaHmix = 0;
	for($i=0; $i<count($numbersArr)-1; $i++){
		for ($j=$i+1; $j<count($numbersArr);$j++){
			$deltaHmix += $C[$i] * $C[$j] * 4 * $deltaH[$maps[$i]][$maps[$j]];
		}
	}
	
	echo "<p style='color:blue'><b>DeltaHmix</b> : $deltaHmix </p>";
	//======================== deltaHmix =================================
	
	
	
	//======================== gma =================================
	// 每种元素的原子半径
	for ($i=0; $i<count($maps); $i++) {
	    $elementsRadium[] = $radium[$maps[$i]];
	}
	
	// 对原子半径进行排序，获取最小的原子半径和最大的原子半径
	sort($elementsRadium);
	$rs = $elementsRadium[0];
	$rl = $elementsRadium[count($elementsRadium)-1];
	
	// 计算ws的值
	$ws = (pow(($rl+$averageR), 2) - pow($averageR, 2)) / pow(($rl+$averageR), 2);
	$ws = 1 - sqrt($ws);
	// 计算wl的值
	$wl = (pow(($rs+$averageR), 2) - pow($averageR, 2)) / pow(($rs+$averageR), 2);
	$wl = 1 - sqrt($wl);
	$gma = $wl/$ws;

	echo "<p style='color:red'><b>Gma</b> : $gma </p>";
	//======================== gma =================================
	

	//======================== Omega =================================
	$Tm = 0;
	for ($i=0; $i<count($maps); $i++) {
	    $Tm += $C[$i] * $meltingPoint[$maps[$i]];
	}
	
	$deltaS = 0;
	for ($i=0; $i<count($maps); $i++) {
	    $deltaS += $C[$i] * log($C[$i]);
	}
	$R = -8.314;
	$deltaS = $R * $deltaS;
	
	if (abs($deltaHmix)) {
		$Omega = $Tm * $deltaS / abs($deltaHmix) / 1000;
	} else {
		$Omega = -99999999;
	}
	
	echo "<p style='color:blue'><b>Oemga</b> : $Omega </p>";
	//======================== Omega =================================


	//========================== alpha ===================================
	$doubleAverageR = 2 * $averageR;

	$alpha = 0;
	for($i=0; $i<count($numbersArr); $i++){
		for ($j=$i; $j<count($numbersArr); $j++){
			$alpha += ($C[$i] * $C[$j] * abs($radium[$maps[$i]] + $radium[$maps[$j]] - $doubleAverageR))/$doubleAverageR;
		}
	}

	echo "<p style='color:red'><b>Aplha2</b> : $alpha </p><br/>";
	//========================== alpha ===================================

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
