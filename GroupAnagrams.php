<?php

class Solution
{
    /**
     * @param String[] $strs
     * @return String[][]
     */
    public function groupAnagrams(array $strs): array
    {
        $result = [];

        foreach ($strs as $str) {
            $sortedStr = str_split($str);
            sort($sortedStr);
            $sortedStr = implode('', $sortedStr);

            if (array_key_exists($sortedStr, $result)) {
                $result[$sortedStr][] = $str;
            } else {
                $result[$sortedStr] = [$str];
            }
        }

        return array_values($result);
    }
}