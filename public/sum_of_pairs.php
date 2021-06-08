<?php

error_reporting(-1);

$nums = [1, 1, 2, 3, 4, -51, 12, 12, 12, -51];

function sumOfPairs(array $nums): int
{
    $result = 0;
    for ($i = 0; $i <= count($nums) - 2; $i++) {
        if ($nums[$i] === $nums[$i + 1]) {
            $result++;
        }
    }
    return $result;
}
