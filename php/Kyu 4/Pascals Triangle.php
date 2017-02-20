<?php

/**
 * Description:
 *
 * Pascal's Triangle
 *
 * Pascal's Triangle
 *
 * Wikipedia article on Pascal's Triangle: http://en.wikipedia.org/wiki/Pascal's_triangle
 *
 * Write a function that, given a depth (n), returns a single-dimensional array representing Pascal's Triangle to the n-th level.
 *
 * For example:
 * pascals_triangle(4) == [1,1,1,1,2,1,1,3,3,1]
*/

function pascals_triangle($n) 
{
  
  $pascalsArr = [];

    for($i = 0; $i < $n; $i++)
    {
        $x = count($pascalsArr) - $i;

        for($z = 0; $z< $i+1; $z++)
        {
            if($z === 0 || $z == $i)
            {
                array_push($pascalsArr, 1);
            }
            else
            {
                array_push($pascalsArr, $pascalsArr[$x + $z] + $pascalsArr[$x + $z -1]);
            }
        }
    }

    return $pascalsArr;
}
