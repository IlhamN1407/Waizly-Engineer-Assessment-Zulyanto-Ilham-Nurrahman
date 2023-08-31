<?php
/* @Author : Zulyanto Ilham Nurrahman
 *
 *
 * @Waizly Basic Problem Solve 1 MiniMaxSum
 * */

//  Create method for Algorithm Logic
function miniMaxSum($arr)
{
    $ArrayNumber = explode(' ', $arr);
    asort($ArrayNumber);
    $SUMMin = array_sum($ArrayNumber) - end($ArrayNumber);

    arsort($ArrayNumber);
    $SUMMax = array_sum($ArrayNumber) - end($ArrayNumber);
    echo $SUMMin . " " . $SUMMax;
}

$arr_temp = rtrim(fgets(STDIN));

miniMaxSum($arr_temp);
