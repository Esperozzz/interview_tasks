<?php

include_once '../src/Helper/SumOfPairs.php';

use function Tasks\Helper\Iterator\sumOfPairs;

$numbers = [1, 1, 2, 3, 4, -51, 12, 12, 12, -51];

echo 'Result: ' . sumOfPairs($numbers);
