<?php

namespace App\Problems\LongestSubstring;

class LongestSubstring
{
    /**
     * @param string $s
     * @return int
     */
    public function lengthOfLongestSubstring($s)
    {
        $inputLength = strlen($s);
        if ($inputLength === 0) {
            return 0;
        }

        $maxLength = 0;
        $currentPattern = '';
        for ($i = 0; $i < $inputLength; ++$i) {
            $index = strpos($currentPattern, $s[$i]);
            if ($index === false) {
                $currentPattern .= $s[$i];
                continue;
            }
            $maxLength = $this->greaterThan($maxLength, strlen($currentPattern));
            $currentPattern = substr($currentPattern, $index+1) . $s[$i];
        }
        return $this->greaterThan($maxLength, strlen($currentPattern));
    }

    /**
     * 大きい値を返す（max関数より早いので）
     * @param int $value1
     * @param int $value2
     * @return int
     */
    private function greaterThan(int $value1, int $value2): int
    {
        return $value1 > $value2 ? $value1 : $value2;
    }
}
