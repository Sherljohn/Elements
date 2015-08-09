<?php
/**
 * 在给定的67种元素中，任意输入几种元素及其对应的原子个数，计算Alpha参数的值
 */



include './data/elementsMappingReverse.php';
include './data/radium.php';

    if ( !empty($_POST['element']) && !empty($_POST['number']) ) {
        $elementsArr = explode(',', trim($_POST['element'],','));   // 接收输入的元素并转化为数组
        $numbersArr  = explode(',', trim($_POST['number'],','));    // 接收输入的元素个数并转化为数组

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
        $doubleAverageR = 2 * $averageR;

        $alpha = 0;
        for($i=0; $i<count($numbersArr); $i++){
        	for ($j=$i; $j<count($numbersArr); $j++){
                $alpha += ($C[$i] * $C[$j] * abs($radium[$maps[$i]] + $radium[$maps[$j]] - $doubleAverageR))/$doubleAverageR;
        	}        	
        }
        
        echo "<p style='color:red'>The value is $alpha </p><br/>";
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
