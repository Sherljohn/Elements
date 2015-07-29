<?php
/**
 * 在给定的73种元素中，任意输入几种元素及其对应的原子个数，计算Alpha参数的值
 */



include './data/elementsMappingReverse73.php';
include './data/deltaH73.php';	

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
        
        $deltaHmix = 0;
        for($i=0; $i<count($numbersArr)-1; $i++){
        	for ($j=$i+1; $j<count($numbersArr);$j++){
        		$detalHmix += $C[$i] * $C[$j] * 4 * $deltaH[$maps[$i]][$maps[$j]];
        	}        	
        }
        
        echo "<p style='color:red'>The value is $deltaHmix </p><br/>";
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
