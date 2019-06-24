<?php

require_once 'hamming_dis.php';

$str1 = $_POST['str1'];
$str2 = $_POST['str2'];


class Leven extends Hamm
{
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
        $counter = 0;

        // split the strings to words inside arrays
        $arr1 = preg_split("/[\s,]+/",$str1);
        $arr2 = preg_split("/[\s,]+/",$str2);

        // for the same number of elements inside both arrays,
        // check the parallel words,when they are different ..
        // check the letters together .. for substitute operation

        if (count($arr1) === count($arr2)){
            for ($i = 0; $i <= $l1; $i++) {
                if ($arr1[$i] !== $arr2[$i]){
                    $w = 0;
                    $count = 0;
                    while (isset($arr1[$i][$w]) != '') {
                        if ($arr1[$i][$w] !== $arr2[$i][$w])
                            $count++;
                            $w++;

                    }
                    $counter = $counter + $count;
                }
            }

        } else {
            // when the total elements in both arrays are different,
            // the difference between their length will give the insert
            // or delete operations

            $counter = abs($l1 - $l2);
        }

        echo "levenshtein: " . $counter  .  " operations" ;
        echo '<br>';
        echo '<br>';

        echo "<a href='index.php'>insert another strings</a>";

    }
}

$case = new Leven($str1,$str2);

?>