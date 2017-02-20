<?php

/**
 * Description:
 *
 * Backwards Read Primes are primes that when read backwards in base 10 (from right to left) are a different prime. (This rules out primes which are palindromes.)
 *
 * Examples:
 * 13 17 31 37 71 73 are Backwards Read Primes
 *
 * 13 is such because it's prime and read from right to left writes 31 which is prime too. Same for the others.
 * Task
 *
 * Find all Backwards Read Primes between two positive given numbers (both inclusive), the second one being greater than the first one. The resulting array or the resulting string will be ordered following the natural order of the prime numbers.
 *
 * backwardsPrime(2, 100) => [13, 17, 31, 37, 71, 73, 79, 97]
 * backwardsPrime(9900, 10000) => [9923, 9931, 9941, 9967]
 *
 */

 function backwardsPrime($start, $stop){
    $prime_numbers = array();

    while($start<=$stop) {
        if(isPrime($start)) {
            $prime_numbers[] = $start;
        }
        $start++;
    }

    return checkPalindrome(array_values(array_unique($prime_numbers)));
}

function isPrime($number) {
    $i = 2;
    if($number == 1) {
        return false;
    }

    if($number == 2) {
        return true;
    }

    while($i <= sqrt($number)) {
        if ($number % $i == 0) {
            return false;
        }
        $i++;
    }

    return true;
}

function checkPalindrome($primes) {
    $backwards_prime = [];
    foreach ($primes as $prime) {
        if($prime != strrev($prime)) {
            if(isPrime(strrev($prime))) {
                $backwards_prime[] = $prime;
            }
        }
    }
    return $backwards_prime;
}
