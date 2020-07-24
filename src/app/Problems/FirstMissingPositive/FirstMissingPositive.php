<?php

namespace App\Problems\FirstMissingPositive;

class FirstMissingPositive {

    /**
     * 41. First Missing Positive
     * Given an unsorted integer array, find the smallest missing positive integer.
     * Your algorithm should run in O(n) time and uses constant extra space.
     * @param array|int[] $nums
     * @return int
     */
    public function firstMissingPositive($nums)
    {
        /**
         * マイナスを無視した値を抽出
         * 最小の整数
         * パターン1: 連続ではない場合 1 2 5 → 3
         * パターン2: 0からの連続の場合 0 1 2 → 3
         *
         * ソート済み配列で、最小値から正の方向に連続性が途切れた数値が正解
         */
        $numsCount = count($nums);
        $positiveIntegers = [];

        // O(n)
        for ($i = 0; $i < $numsCount; ++$i) {
            if ($nums[$i] > 0) {
                $positiveIntegers[] = $nums[$i];
            }
        }

        // 正の整数が存在しない場合
        $count = count($positiveIntegers);
        if ($count === 0) {
            return 1;
        }

        asort($positiveIntegers);
        $positiveIntegers = array_values($positiveIntegers);
        if ($positiveIntegers[0] === 0) {
            return 1;
        }
        if ($positiveIntegers[0] > 1) {
            return 1;
        }

        $currentValue = $positiveIntegers[0];
        for ($i = 1; $i < $count; ++$i) {
            if ($currentValue+1 < $positiveIntegers[$i]) {
                return $currentValue+1;
            }
            $currentValue = $positiveIntegers[$i];
        }
        return $currentValue+1;
    }
}
