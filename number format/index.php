<?php
$num = 10000000.215;

echo number_format($num,5,'.',',');
echo "<br/>";

setlocale(LC_MONETARY, 'en_IN');
$amount = money_format('%!i', $num);
echo $amount;
?>