<?php

$info = array('coffee', 'brown', 'caffeine');
$b = count($info) ;
$number = range(1,$b);
$c=array_combine($number,$info);
echo $c[1];
?>
