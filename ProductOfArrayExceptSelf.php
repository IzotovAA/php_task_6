<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function productExceptSelf(array $nums): array
    {
        $nulls = 0;
        $nullKey = null;
        $productOfNums = 1;

        foreach ($nums as $key => $num) {
            if ($num !== 0) {
                $productOfNums *= $num;
            } else {
                $nullKey = $key;
                $nulls++;
            }
        }

        if ($nulls === 0) {
            foreach ($nums as $key => $num) {
                $nums[$key] = $productOfNums / $num;
            }

            return $nums;

        } elseif ($nulls === 1) {
            $nums = array_fill(0, count($nums), 0);
            $nums[$nullKey] = $productOfNums;

            return $nums;

        } else {
            return array_fill(0, count($nums), 0);
        }
    }
}