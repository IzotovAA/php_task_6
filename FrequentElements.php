<?php

class Solution1 {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    public function topKFrequent(array $nums, int $k): array
    {
        $temp = [];
        $result = [];

        foreach ($nums as $num) {
            if (array_key_exists($num, $temp)) {
                $temp[$num]++;
            } else {
                $temp[$num] = 1;
            }
        }

        uasort($temp, [$this, 'compare']);

        foreach ($temp as $num => $count) {
            if ($k > 0) {
                $result[] = $num;
            } else {
                break;
            }
            $k--;
        }

        return $result;
    }

    private function compare($a, $b): int
    {
        if ($a == $b) {
            return 0;
        }

        return ($a < $b) ? 1 : -1;
    }
}

class Solution2 {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    public function topKFrequent(array $nums, int $k): array
    {
        $temp = [];
        $result = [];

        foreach ($nums as $num) {
            if (array_key_exists($num, $temp)) {
                $temp[$num]++;
            } else {
                $temp[$num] = 1;
            }
        }

        while ($k > 0) {
            $maxCount = max($temp);
            $maxValue = array_search($maxCount, $temp);
            $result[] = $maxValue;
            $temp[$maxValue] = 0;
            $k--;
        }

        return $result;
    }
}

class Solution3
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    public function topKFrequent(array $nums, int $k): array
    {
        $result = [];

        foreach ($nums as $num) {
            if (array_key_exists($num, $result)) {
                $result[$num]++;
            } else {
                $result[$num] = 1;
            }
        }

        arsort($result);

        return array_slice(array_keys($result), 0, $k);
    }
}