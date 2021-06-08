<?php

namespace Tasks\Helper\Iterator;

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