<?php

// 合金中可能的元素的映射
include './data/elementsMapping.php';

// 各元素对应的原子半径 
include './data/radium.php';

// 各元素两两之间的混合焓
include './data/deltaH.php';

// 各元素对应的熔点
include './data/meltingPoint.php';

$number       = isset($_POST['number']) ? $_POST['number'] : '';
$minSigma     = isset($_POST['minSigma']) ? $_POST['minSigma'] : '';
$maxSigma     = isset($_POST['maxSigma']) ? $_POST['maxSigma'] : '';
$minDeltaH    = isset($_POST['minDeltaH']) ? $_POST['minDeltaH'] : '';
$maxDeltaH    = isset($_POST['maxDeltaH']) ? $_POST['maxDeltaH'] : '';
$minGma    	  = isset($_POST['minGma']) ? $_POST['minGma'] : '';
$maxGma       = isset($_POST['maxGma']) ? $_POST['maxGma'] : '';
$minOmega     = isset($_POST['minOmega']) ? $_POST['minOmega'] : '';
$maxOmega     = isset($_POST['maxOmega']) ? $_POST['maxOmega'] : '';
$postElements = isset($_POST['elements']) ? $_POST['elements'] : '';

if ($number!='' && $minSigma!='' && $maxSigma!='' && $minDeltaH!='' && $maxDeltaH!='' && $minGma!='' && $maxGma!=''&& $minOmega!='' && $maxOmega!='') {
        if (empty($postElements)) { // 如果没有输入元素，则默认使用系统中的那67种元素
                switch ($number) {
                        case 5:
                                $numbers = array(1,1,1,1,1);
                                $elements = array();
                
                                for ($i1=1; $i1<68; $i1++) {
                                        for ($i2=$i1+1; $i2<68; $i2++) {
                                                for ($i3=$i2+1; $i3<68; $i3++) {
                                                        for ($i4=$i3+1; $i4<68; $i4++) {
                                                                for ($i5=$i4+1; $i5<68; $i5++) {
                                                                        unset($elements);
                                                                        $elements[0] = $i1;
                                                                        $elements[1] = $i2;
                                                                        $elements[2] = $i3;
                                                                        $elements[3] = $i4;
                                                                        $elements[4] = $i5;
                
                                                                        $sigma     = getSigma($elements, $numbers, $radium);
                                                                        $deltaHmix = getDeltaHmix($elements, $numbers, $deltaH);
                                                                        $gma       = getGma($elements, $numbers, $radium);
                                                                        $omega     = getOmega($elements, $numbers, $meltingPoint, $deltaHmix);
                                                                        
                                                                        if ( $sigma >= $minSigma && $sigma <= $maxSigma && $deltaHmix >= $minDeltaH && $deltaHmix <= $maxDeltaH && $gma >= $minGma && $gma <= $maxGma && $omega >= $minOmega && $omega <= $maxOmega) {
                                                                                echo $elementsMapping[$i1]."  ".$elementsMapping[$i2]."  ".$elementsMapping[$i3]."  ".$elementsMapping[$i4]."  ".$elementsMapping[$i5]."    -----    Sigma: $sigma    -----    deltaHmix: $deltaHmix    -----    Gma: $gma    -----    Omega: $omega"."<br/>";
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                
                                break;
                        case 6:
                                $numbers = array(1,1,1,1,1,1);
                                $elements = array();
                
                                for ($i1=1; $i1<68; $i1++) {
                                        for ($i2=$i1+1; $i2<68; $i2++) {
                                                for ($i3=$i2+1; $i3<68; $i3++) {
                                                        for ($i4=$i3+1; $i4<68; $i4++) {
                                                                for ($i5=$i4+1; $i5<68; $i5++) {
                                                                        for ($i6=$i5+1; $i6<68; $i6++) {
                                                                                unset($elements);
                                                                                $elements[0] = $i1;
                                                                                $elements[1] = $i2;
                                                                                $elements[2] = $i3;
                                                                                $elements[3] = $i4;
                                                                                $elements[4] = $i5;
                                                                                $elements[5] = $i6;
                
                                                                                $sigma     = getSigma($elements, $numbers, $radium);
                                                                                $deltaHmix = getDeltaHmix($elements, $numbers, $deltaH);
                                                                                $gma       = getGma($elements, $numbers, $radium);
                                                                                $omega     = getOmega($elements, $numbers, $meltingPoint, $deltaHmix);
                
                                                                                if ( $sigma >= $minSigma && $sigma <= $maxSigma && $deltaHmix >= $minDeltaH && $deltaHmix <= $maxDeltaH && $gma >= $minGma && $gma <= $maxGma && $omega >= $minOmega && $omega <= $maxOmega) {
                                                                                        echo $elementsMapping[$i1]."  ".$elementsMapping[$i2]."  ".$elementsMapping[$i3]."  ".$elementsMapping[$i4]."  ".$elementsMapping[$i5]."  ".$elementsMapping[$i6]."    -----    Sigma: $sigma    -----    deltaHmix: $deltaHmix    -----    Gma: $gma    -----    Omega: $omega"."<br/>";
                                                                                }
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                
                                break;
                        case 7:
                                $numbers = array(1,1,1,1,1,1,1);
                                $elements = array();
                
                                for ($i1=1; $i1<68; $i1++) {
                                        for ($i2=$i1+1; $i2<68; $i2++) {
                                                for ($i3=$i2+1; $i3<68; $i3++) {
                                                        for ($i4=$i3+1; $i4<68; $i4++) {
                                                                for ($i5=$i4+1; $i5<68; $i5++) {
                                                                        for ($i6=$i5+1; $i6<68; $i6++) {
                                                                                for ($i7=$i6+1; $i7<68; $i7++) {
                                                                                        unset($elements);
                                                                                        $elements[0] = $i1;
                                                                                        $elements[1] = $i2;
                                                                                        $elements[2] = $i3;
                                                                                        $elements[3] = $i4;
                                                                                        $elements[4] = $i5;
                                                                                        $elements[5] = $i6;
                                                                                        $elements[6] = $i7;
                
                                                                                        $sigma     = getSigma($elements, $numbers, $radium);
                                                                                        $deltaHmix = getDeltaHmix($elements, $numbers, $deltaH);
                                                                                        $gma       = getGma($elements, $numbers, $radium);
                                                                                        $omega     = getOmega($elements, $numbers, $meltingPoint, $deltaHmix);
                
                                                                                        if ( $sigma >= $minSigma && $sigma <= $maxSigma && $deltaHmix >= $minDeltaH && $deltaHmix <= $maxDeltaH && $gma >= $minGma && $gma <= $maxGma  && $omega >= $minOmega && $omega <= $maxOmega) {
                                                                                                echo $elementsMapping[$i1]."  ".$elementsMapping[$i2]."  ".$elementsMapping[$i3]."  ".$elementsMapping[$i4]."  ".$elementsMapping[$i5]."  ".$elementsMapping[$i6]."  ".$elementsMapping[$i7]."    -----    Sigma: $sigma    -----    deltaHmix: $deltaHmix    -----    Gma: $gma    -----    Omega: $omega"."<br/>";
                                                                                        }
                                                                                }
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                
                                break;
                        case 8:
                                $numbers = array(1,1,1,1,1,1,1,1);
                                $elements = array();
                
                                for ($i1=1; $i1<68; $i1++) {
                                        for ($i2=$i1+1; $i2<68; $i2++) {
                                                for ($i3=$i2+1; $i3<68; $i3++) {
                                                        for ($i4=$i3+1; $i4<68; $i4++) {
                                                                for ($i5=$i4+1; $i5<68; $i5++) {
                                                                        for ($i6=$i5+1; $i6<68; $i6++) {
                                                                                for ($i7=$i6+1; $i7<68; $i7++) {
                                                                                        for ($i8=$i7+1; $i8<68; $i8++) {
                                                                                                unset($elements);
                                                                                                $elements[0] = $i1;
                                                                                                $elements[1] = $i2;
                                                                                                $elements[2] = $i3;
                                                                                                $elements[3] = $i4;
                                                                                                $elements[4] = $i5;
                                                                                                $elements[5] = $i6;
                                                                                                $elements[6] = $i7;
                                                                                                $elements[7] = $i8;
                
                                                                                                $sigma     = getSigma($elements, $numbers, $radium);
                                                                                                $deltaHmix = getDeltaHmix($elements, $numbers, $deltaH);
                                                                                                $gma       = getGma($elements, $numbers, $radium);
                                                                                                $omega     = getOmega($elements, $numbers, $meltingPoint, $deltaHmix);
                
                                                                                                if ( $sigma >= $minSigma && $sigma <= $maxSigma && $deltaHmix >= $minDeltaH && $deltaHmix <= $maxDeltaH && $gma >= $minGma && $gma <= $maxGma  && $omega >= $minOmega && $omega <= $maxOmega) {
                                                                                                        echo $elementsMapping[$i1]."  ".$elementsMapping[$i2]."  ".$elementsMapping[$i3]."  ".$elementsMapping[$i4]."  ".$elementsMapping[$i5]."  ".$elementsMapping[$i6]."  ".$elementsMapping[$i7]."  ".$elementsMapping[$i8]."    -----    Sigma: $sigma    -----    deltaHmix: $deltaHmix    -----    Gma: $gma    -----    Omega: $omega"."<br/>";
                                                                                                }
                                                                                        }
                                                                                }
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                
                                break;
                        default:
                                echo "<p style='color:red'>You have said that there were at most 8 elements :)</p><br/>";
                }
        } else { // 如果用户输入了元素，则在所输入的元素中进行合金计算
                $postElements    = trim($postElements);
                $postElements    = trim($postElements,',');
                $postElementsArr = explode(',', $postElements);
                
                foreach ($postElementsArr as $key=>$value) {
                        $postElementsArr[$key] = trim($value);
                }
                
                // 判断输入的元素是否在系统给定是67种元素之中
                foreach ($postElementsArr as $value) {
                        if (!in_array($value, $elementsMapping)) {
                                echo "<p style='color:red'>The element $value does not exist in the system :)</p><br/>";
                                exit;
                        }
                }
                
                // 检出有效元素和无效元素，即需要参与计算的元素和无需参与计算的元素
                $validKeys   = array();
                $invalidKeys = array();
                foreach ($elementsMapping as $k=>$val) {
                        if (in_array($val, $postElementsArr)) {
                                $validKeys[]   = $k;
                        } else {
                                $invalidKeys[] = $k;
                        }
                } 
                
            
                foreach ($invalidKeys as $val) {
                        unset($elementsMapping[$val]);
                        unset($radium[$val]);
                        unset($meltingPoint[$val]);
                        unset($deltaH[$val]);
                }
                
                foreach ($deltaH as $key=>$value) {
                        foreach ($value as $k=>$v) {
                                if (in_array($k, $invalidKeys)) {
                                        unset($deltaH[$key][$k]);
                                }
                        }
                }
                
                
                $elementsMapping = array_values($elementsMapping);
                $radium          = array_values($radium);
                $meltingPoint    = array_values($meltingPoint);
                $deltaH          = array_values($deltaH);
               
                foreach ($deltaH as $key=>$value) {
                    $deltaH[$key] = array_values($value);
                }
                
                
                foreach ($elementsMapping as $key=>$value) {
                    $elementsMapping_plus[$key+1] = $value;
                }
                
                foreach ($radium as $key=>$value) {
                    $radium_plus[$key+1] = $value;
                }
                
                foreach ($meltingPoint as $key=>$value) {
                    $meltingPoint_plus[$key+1] = $value;
                }
                
                foreach ($deltaH as $key=>$value) {
                    $deltaH_plus[$key+1] = $value;
                }
                foreach ($deltaH_plus as $key=>$value) {
                    foreach ($value as $k=>$v) {
                        $deltaH_plus[$key][$k+1] = $v;
                    }
                    unset($deltaH_plus[$key][0]);
                }
        
                $countPostElements = count($elementsMapping_plus) + 1;

                switch ($number) {
                        case 5:
                                if ($number >= $countPostElements) {
                                    echo "<p style='color:red'>The number of the elements is less than the first parameter :(</p><br/>";
                                    exit;
                                }
                                
                                $numbers = array(1,1,1,1,1);
                                $elements = array();

                                for ($i1=1; $i1<$countPostElements; $i1++) {
                                        for ($i2=$i1+1; $i2<$countPostElements; $i2++) {
                                                for ($i3=$i2+1; $i3<$countPostElements; $i3++) {
                                                        for ($i4=$i3+1; $i4<$countPostElements; $i4++) {
                                                                for ($i5=$i4+1; $i5<$countPostElements; $i5++) {
                                                                        unset($elements);
                                                                        $elements[0] = $i1;
                                                                        $elements[1] = $i2;
                                                                        $elements[2] = $i3;
                                                                        $elements[3] = $i4;
                                                                        $elements[4] = $i5;
                
                                                                        $sigma     = getSigma($elements, $numbers, $radium_plus);
                                                                        $deltaHmix = getDeltaHmix($elements, $numbers, $deltaH_plus);
                                                                        $gma	   = getGma($elements, $numbers, $radium_plus);
                                                                        $omega     = getOmega($elements, $numbers, $meltingPoint_plus, $deltaHmix);
                                                                        
                                                                        if ( $sigma >= $minSigma && $sigma <= $maxSigma && $deltaHmix >= $minDeltaH && $deltaHmix <= $maxDeltaH && $gma >= $minGma && $gma <= $maxGma && $omega >= $minOmega && $omega <= $maxOmega) {
                                                                                echo $elementsMapping_plus[$i1]."  ".$elementsMapping_plus[$i2]."  ".$elementsMapping_plus[$i3]."  ".$elementsMapping_plus[$i4]."  ".$elementsMapping_plus[$i5]."    -----    Sigma: ". sprintf("%.8f", $sigma)."    -----    deltaHmix: $deltaHmix    -----    Gma: $gma    -----    Omega: $omega"."<br/>";
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                
                                break;
                        case 6:
                                if ($number >= $countPostElements) {
                                        echo "<p style='color:red'>The number of the elements is less than the first parameter :(</p><br/>";
                                        exit;
                                }
                                
                                $numbers = array(1,1,1,1,1,1);
                                $elements = array();
                
                                for ($i1=1; $i1<$countPostElements; $i1++) {
                                        for ($i2=$i1+1; $i2<$countPostElements; $i2++) {
                                                for ($i3=$i2+1; $i3<$countPostElements; $i3++) {
                                                        for ($i4=$i3+1; $i4<$countPostElements; $i4++) {
                                                                for ($i5=$i4+1; $i5<$countPostElements; $i5++) {
                                                                        for ($i6=$i5+1; $i6<$countPostElements; $i6++) {
                                                                                unset($elements);
                                                                                $elements[0] = $i1;
                                                                                $elements[1] = $i2;
                                                                                $elements[2] = $i3;
                                                                                $elements[3] = $i4;
                                                                                $elements[4] = $i5;
                                                                                $elements[5] = $i6;
                
                                                                                $sigma     = getSigma($elements, $numbers, $radium_plus);
                                                                                $deltaHmix = getDeltaHmix($elements, $numbers, $deltaH_plus);
                                                                                $gma	   = getGma($elements, $numbers, $radium_plus);
                                                                                $omega     = getOmega($elements, $numbers, $meltingPoint_plus, $deltaHmix);
                                                                                
                                                                                if ( $sigma >= $minSigma && $sigma <= $maxSigma && $deltaHmix >= $minDeltaH && $deltaHmix <= $maxDeltaH && $gma >= $minGma && $gma <= $maxGma  && $omega >= $minOmega && $omega <= $maxOmega) {
                                                                                        echo $elementsMapping_plus[$i1]."  ".$elementsMapping_plus[$i2]."  ".$elementsMapping_plus[$i3]."  ".$elementsMapping_plus[$i4]."  ".$elementsMapping_plus[$i5]."  ".$elementsMapping_plus[$i6]."    -----    Sigma: ". sprintf("%.8f", $sigma)."    -----    deltaHmix: $deltaHmix    -----    Gma: $gma    -----    Omega: $omega"."<br/>";
                                                                                }
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                
                                break;
                        case 7:
                                if ($number >= $countPostElements) {
                                        echo "<p style='color:red'>The number of the elements is less than the first parameter :(</p><br/>";
                                        exit;
                                }
                                
                                $numbers = array(1,1,1,1,1,1,1);
                                $elements = array();
                
                                for ($i1=1; $i1<$countPostElements; $i1++) {
                                        for ($i2=$i1+1; $i2<$countPostElements; $i2++) {
                                                for ($i3=$i2+1; $i3<$countPostElements; $i3++) {
                                                        for ($i4=$i3+1; $i4<$countPostElements; $i4++) {
                                                                for ($i5=$i4+1; $i5<$countPostElements; $i5++) {
                                                                        for ($i6=$i5+1; $i6<$countPostElements; $i6++) {
                                                                                for ($i7=$i6+1; $i7<$countPostElements; $i7++) {
                                                                                        unset($elements);
                                                                                        $elements[0] = $i1;
                                                                                        $elements[1] = $i2;
                                                                                        $elements[2] = $i3;
                                                                                        $elements[3] = $i4;
                                                                                        $elements[4] = $i5;
                                                                                        $elements[5] = $i6;
                                                                                        $elements[6] = $i7;
                
                                                                                        $sigma     = getSigma($elements, $numbers, $radium_plus);
                                                                                        $deltaHmix = getDeltaHmix($elements, $numbers, $deltaH_plus);
                                                                                        $gma	   = getGma($elements, $numbers, $radium_plus);
                                                                                        $omega     = getOmega($elements, $numbers, $meltingPoint_plus, $deltaHmix);
                
                                                                                        if ( $sigma >= $minSigma && $sigma <= $maxSigma && $deltaHmix >= $minDeltaH && $deltaHmix <= $maxDeltaH && $gma >= $minGma && $gma <= $maxGma  && $omega >= $minOmega && $omega <= $maxOmega) {
                                                                                                echo $elementsMapping_plus[$i1]."  ".$elementsMapping_plus[$i2]."  ".$elementsMapping_plus[$i3]."  ".$elementsMapping_plus[$i4]."  ".$elementsMapping_plus[$i5]."  ".$elementsMapping_plus[$i6]."  ".$elementsMapping_plus[$i7]."    -----    Sigma: ". sprintf("%.8f", $sigma)."    -----    deltaHmix: $deltaHmix    -----    Gma: $gma    -----    Omega: $omega"."<br/>";
                                                                                        }
                                                                                }
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                
                                break;
                        case 8:
                                if ($number >= $countPostElements) {
                                        echo "<p style='color:red'>The number of the elements is less than the first parameter :(</p><br/>";
                                        exit;
                                }
                                
                                $numbers = array(1,1,1,1,1,1,1,1);
                                $elements = array();
                
                                for ($i1=1; $i1<$countPostElements; $i1++) {
                                        for ($i2=$i1+1; $i2<$countPostElements; $i2++) {
                                                for ($i3=$i2+1; $i3<$countPostElements; $i3++) {
                                                        for ($i4=$i3+1; $i4<$countPostElements; $i4++) {
                                                                for ($i5=$i4+1; $i5<$countPostElements; $i5++) {
                                                                        for ($i6=$i5+1; $i6<$countPostElements; $i6++) {
                                                                                for ($i7=$i6+1; $i7<$countPostElements; $i7++) {
                                                                                        for ($i8=$i7+1; $i8<$countPostElements; $i8++) {
                                                                                                unset($elements);
                                                                                                $elements[0] = $i1;
                                                                                                $elements[1] = $i2;
                                                                                                $elements[2] = $i3;
                                                                                                $elements[3] = $i4;
                                                                                                $elements[4] = $i5;
                                                                                                $elements[5] = $i6;
                                                                                                $elements[6] = $i7;
                                                                                                $elements[7] = $i8;
                
                                                                                                $sigma     = getSigma($elements, $numbers, $radium_plus);
                                                                                                $deltaHmix = getDeltaHmix($elements, $numbers, $deltaH_plus);
                                                                                                $gma	   = getGma($elements, $numbers, $radium_plus);
                                                                                                $omega     = getOmega($elements, $numbers, $meltingPoint_plus, $deltaHmix);
                
                                                                                                if ( $sigma >= $minSigma && $sigma <= $maxSigma && $deltaHmix >= $minDeltaH && $deltaHmix <= $maxDeltaH && $gma >= $minGma && $gma <= $maxGma  && $omega >= $minOmega && $omega <= $maxOmega) {
                                                                                                        echo $elementsMapping_plus[$i1]."  ".$elementsMapping_plus[$i2]."  ".$elementsMapping_plus[$i3]."  ".$elementsMapping_plus[$i4]."  ".$elementsMapping_plus[$i5]."  ".$elementsMapping_plus[$i6]."  ".$elementsMapping_plus[$i7]."  ".$elementsMapping_plus[$i8]."    -----    Sigma: ". sprintf("%.8f", $sigma)."    -----    deltaHmix: $deltaHmix    -----    Gma: $gma    -----    Omega: $omega"."<br/>";
                                                                                                }
                                                                                        }
                                                                                }
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                
                                break;
                        default:
                                echo "<p style='color:red'>You have said that there were at most 8 elements :)</p><br/>";
                }
                
  }
        
}



/**
 * 
 * @description 计算给定元素以及对应原子个数所组成的合金的混合焓
 * @param array $elements
 * @param arary $numbers
 * @param array $deltaH
 * @return float detalHmix
 *
 * @author Sherljohn
 * @date 2015-3-7
 */
function getDeltaHmix($elements, $numbers, $deltaH) {
    // 如果元素数组与原子个数数组的元素数量不等，返回-1
    if (count($elements) != count($numbers)) {
        return -1;
    }
    
    // 计算原子个数的总数
    $total = array_sum($numbers);
    
    // 计算各元素的原子百分数
    foreach ($numbers as $value) {
        $C[] = $value / $total;
    }

    // 计算合金的混合焓
    $deltaHmix = 0; 
    for($i=0; $i<count($elements)-1; $i++) {
        for ($j=$i+1; $j<count($elements); $j++) {
            $deltaHmix += $C[$i] * $C[$j] * 4 * $deltaH[$elements[$i]][$elements[$j]];
        }
    }
    
    return $deltaHmix;
}



/**
 * 
 * @description 计算给定元素的原子半径比
 * @param array $elements
 * @param array $numbers
 * @param array $radium
 * @return float detalHmix
 *
 * @author Sherljohn
 * @date 2015-3-7
 */
function getSigma($elements, $numbers, $radium) {
	
    // 如果元素数组与原子个数数组的元素数量不等，返回-1
    if (count($elements) != count($numbers)) {
        return -1;
    }
    
    // 计算原子个数的总数
    $total = array_sum($numbers);
    
    // 计算各元素的原子百分数
    foreach ($numbers as $value) {
        $C[] = $value / $total;
    }

    // 各原子的平均半径
    $averageR = 0;
    for ($i=0; $i<count($elements); $i++) { 
        $averageR += $C[$i] * $radium[$elements[$i]];
    }

    $sigmaSquare = 0;
    for ($i=0; $i <count($elements) ; $i++) { 
        $temp = 1 - $radium[$elements[$i]] / $averageR;
        $sigmaSquare += $C[$i] * pow($temp,2);
    }

    return sqrt($sigmaSquare);
}


/**
 *
 * @description 计算gma
 * @param array $elements
 * @param array $numbers
 * @param array $radium
 * @return float detalHmix
 *
 * @author Sherljohn
 * @date 2015-3-7
 */
function getGma($elements, $numbers, $radium) {

	// 如果元素数组与原子个数数组的元素数量不等，返回-1
	if (count($elements) != count($numbers)) {
		return -1;
	}

	// 计算原子个数的总数
	$total = array_sum($numbers);

	// 计算各元素的原子百分数
	foreach ($numbers as $value) {
		$C[] = $value / $total;
	}

	// 各原子的平均半径
	$averageR = 0;
	for ($i=0; $i<count($elements); $i++) {
		$averageR += $C[$i] * $radium[$elements[$i]];
	}

	//每种元素的原子半径
	for ($i=0; $i<count($elements); $i++) {
		$elementsRadium[] = $radium[$elements[$i]];
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
	
	return $gma;
}


/**
 * @description 计算omega
 * @param array $elements
 * @param array $numbers
 * @param array $meltingPoint
 * @param array $deltaHmix
 * @return number
 *
 *@author Sherljohn
 *@date 2015年7月22日
 */
function getOmega($elements, $numbers, $meltingPoint, $deltaHmix) {

    // 如果元素数组与原子个数数组的元素数量不等，返回-1
    if (count($elements) != count($numbers)) {
        return -1;
    }

    // 计算原子个数的总数
    $total = array_sum($numbers);

    // 计算各元素的原子百分数
    foreach ($numbers as $value) {
        $C[] = $value / $total;
    }

    $Tm = 0;
    for ($i=0; $i<count($elements); $i++) {
        $Tm += $C[$i] * $meltingPoint[$elements[$i]];
    }
    
    $deltaS = 0;
    for ($i=0; $i<count($elements); $i++) {
        $deltaS += $C[$i] * log($C[$i]);
    }
    $R = -8.314;
    $deltaS = $R * $deltaS;
    
    $Omega = $Tm * $deltaS / abs($deltaHmix);

    return $Omega;
}

?>




<html>
    <body>
        <br/><br/><br/><br/>
        <form name="input" method="post" >
            The number of the elements consist of the alloy:<br/>
            <input type="text" name="number" style="width:200px;height:30px"><br/><br/>
            
            The range of the Sigma:<br/>
            <input type="text" name="minSigma" style="width:200px;height:30px">
            ~
            <input type="text" name="maxSigma" style="width:200px;height:30px"><br/><br/>
            
            The the range of DeltaH:<br/>
            <input type="text" name="minDeltaH" style="width:200px;height:30px">
            ~
            <input type="text" name="maxDeltaH" style="width:200px;height:30px"><br/><br/>
            
             The the range of Gma:<br/>
            <input type="text" name="minGma" style="width:200px;height:30px">
            ~
            <input type="text" name="maxGma" style="width:200px;height:30px"><br/><br/>
            
            The the range of Omega:<br/>
            <input type="text" name="minOmega" style="width:200px;height:30px">
            ~
            <input type="text" name="maxOmega" style="width:200px;height:30px"><br/><br/>
            
            The elements(separated by English comma symbol)<br/>
            <input type="text" name="elements" style="width:500px;height:30px"><br/><br/>
            
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>