<?php
/*
 *
 * When generating lists or tables using php, it is super useful to apply even/odd classes to each row of data in order to simplify CSS styling.
 * Used inside a loop, class names would be named .example-class0 and .example-class1 alternating.
 * Increasing the “2″ number allows you to increment in thirds or fourths or whatever you need:
 */
$xyz = 0;
for($i=0;$i<10;$i++){
    print("<div class='example-class-".($xyz++%2)."'></div> \n");
}

