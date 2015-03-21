<?php

/*
Fantastic three sequence

The **fantastic three sequence** is a series of numbers in which each subsequent number is
the sum of the previous three,minus one.
The first few numbers in fantastic three sequence are:

0, 1, 1, 1, 2, 3, 5, etc

Write a function that prints the **Nth** number in the fantastic three sequence to standard output.

Sample Input

n: 4

Sample Output

1

Additional Samples

n: 7 => 5
n: 9 => 16
n: 15 => 601


Code Template:
*/

function fantastic3($n) {
    $series = array(0,1,1,1);
    for($i=3 ; $i<=$n ; $i++){
        $a = (isset($series[ (int)$i-3 ]))?$series[ (int)$i-3 ]:0;
        $b = (isset($series[ (int)$i-2 ]))?$series[ (int)$i-2 ]:0;
        $c = (isset($series[ (int)$i-1 ]))?$series[ (int)$i-1 ]:0;
        $d = ($a+$b+$c)-1;
        if($d<0){
            $d = 0;
        }
        $series[$i] = $d;
    }
    echo $series[ (int)$n-1 ];
}
// Do NOT call the fantastic3 function in the code
// you write. The system will call it automatically.
fantastic3(7);
