<?php

/**
 * Description:
 *
 * Given the string representations of two integers, return the string representation of the sum of those integers.
 *
 * For example:
 *
 * sumStrings('1','2') // => '3'
 *
 * A string representation of an integer will contain no characters besides the ten numerals "0" to "9".
*/

function sum_strings($a, $b) {
    $list = [strlen($a), strlen($b)];
    sort($list);

    if ($list[0] === strlen($a)) {
        if(strlen($a) != 0) {
            $first= str_split($a);
        } else {
            $first[] = '0';
        }
        $last = $b;
    }
    else {
        $first = str_split($b);
        $last = $a;
    }

    while (count($first) < strlen($last)) {
        array_unshift($first, '0');
    }

    $first2 = implode('',$first);

    $carry = 0;
    $total = '';

    for ($i = $list[1]-1; $i >= 0; $i--) {
        $numA = (int)$first2{$i};
        $numB = (int)$last{$i};

        $total = (($numA + $numB + $carry) % 10) .$total;
        $carry = floor(((int)$numA + (int)$numB + (int)$carry) / 10);
    }

    if ($carry > 0) {
        $total = $carry . $total;
    }

    $total2 = str_split($total);

    for ($w = 0; $w < count($total2); $w++) {
        if ($total2[$w] === '0') {
            $total = substr($total, 1);
        }
        else {
            return $total;
        }
    }
}
