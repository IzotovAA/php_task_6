<?php

class Solution
{
    private bool $flag = true;
    private array $groups = [];
    private array $checkedIndex = [];

    /**
     * @param String[] $strs
     * @return String[][]
     */
    public function groupAnagrams(array $strs): array
    {
        $length = count($strs);

        echo '$length = ' . $length . PHP_EOL;

        for ($i = 0; $i < $length; $i++) {
            echo '$i = ' . $i . PHP_EOL;

            if (in_array($i, $this->checkedIndex)) {
                continue;
            }

            $subGroup = [$strs[$i]];
            $this->checkedIndex[] = $i;

            for ($j = $i + 1; $j < $length; $j++) {
                if (!in_array($j, $this->checkedIndex)
                    && strlen($strs[$i]) === strlen($strs[$j])
                    && $this->isAnagram($strs[$i], $strs[$j])) {
                    $subGroup[] = $strs[$j];
                    $this->checkedIndex[] = $j;
                }
            }

            $this->groups[] = $subGroup;
        }

        return $this->groups;
    }

    private function isAnagram(string $str1, string $str2): bool
    {
        if ($str1 === $str2 ) {
            return true;
        }

        $str1SymbolCount = $this->symbolCounter($str1);
        $str2SymbolCount = $this->symbolCounter($str2);

        foreach ($str1SymbolCount as $key => $value) {
            if (!key_exists($key, $str2SymbolCount)
                || $str1SymbolCount[$key] !== $str2SymbolCount[$key]) {
                $this->flag = false;
                break;
            }
        }

        $result = $this->flag;
        $this->flag = true;

        return $result;
    }

    private function symbolCounter(string $str): array
    {
        $result = [];
        $length = strlen($str);

        for ($i = 0; $i < $length; $i++) {
            if (array_key_exists($str[$i], $result)) {
                $result[$str[$i]]++;
            } else {
                $result[$str[$i]] = 1;
            }
        }

        return $result;
    }
}

$solution = new Solution();
$input = ["rag","orr","err","bad","foe","ivy",
    "tho","gem","len","cat","ron","ump","nev",
    "cam","pen","dis","rob","tex","sin","col",
    "buy","say","big","wed","eco","bet","fog",
    "buy","san","kid","lox","sen","ani","mac",
    "eta","wis","pot","sid","dot","ham","gay",
    "oar","sid","had","paw","sod","sop"];

$result = $solution->groupAnagrams($input);
sort($result);
print_r($result);