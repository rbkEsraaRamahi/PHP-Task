<?php

class Hamm{
    protected $str1;
    protected $str2;

    public function __construct($str1,$str2)
    {
        // save the longer string in the first variable
        if (strlen($str1) >= strlen($str2)){
            $this->str1 = $str1;
            $this->str2 = $str2;
        } else {
            $this->str1= $str2;
            $this->str2= $str1;
        }

        $l1 = strlen($str1);
        $l2 = strlen($str2);
        $counter = abs($l1 - $l2); // for the space padding
        $last = 0;
        $check = false;

        // split the strings to words inside arrays
        $arr1 = preg_split("/[\s,]+/",$str1);
        $arr2 = preg_split("/[\s,]+/",$str2);

        // for the same number of elements inside both arrays,
        // check the parallel words,when they are different ..
        // check the letters together

        if (count($arr1) === count($arr2)){
            for ($i = 0; $i <= $l1; $i++) {
                if ($arr1[$i] !== $arr2[$i]){
                    $w = 0;
                    $count = 0;
                    while (isset($arr1[$i][$w]) != '') {
                        if ($arr1[$i][$w] != $arr2[$i][$w])
                            $count++;
                            $w++;

                    }
                    $counter = $counter + $count;
                }
            }

        } else {
            // when the total elements in both arrays are different,
            // check each parallel elements together, when they are
            // not the same check the word with both the previous and
            // the next word

            for ($i = 0; $i <= $l1; $i++) {
                if ($arr1[$i] === $arr2[$i]) {
                    $last = $last + 1;
                } else {
                    for ($j = $last; $j < $i + 2; $j++) {
                        if ($arr1[$i] === $arr2[$j]) {
                            $check = true;
                            $last = $j + 1;
                        }
                    }
                    if ($check === false) {
                        $counter = $counter + strlen($arr1[$i]);
                    }
                }
            }
        }
            echo "Number of operations: " . $counter;

    }
}



