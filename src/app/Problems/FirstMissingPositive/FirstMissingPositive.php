<?php

namespace App\Problems\FirstMissingPositive;

require_once 'app/bootstrap.php';

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
        $logger = getLog();
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
        $logger->info('positiveIntegers = ' . print_r($positiveIntegers, true));

        // 正の整数が存在しない場合
        $count = count($positiveIntegers);
        if ($count === 0) {
            return 1;
        }

        asort($positiveIntegers);
        $positiveIntegers = array_values($positiveIntegers);
        $logger->info('sorted positiveIntegers = ' . print_r($positiveIntegers, true));
        if ($positiveIntegers[0] === 0) {
            return 1;
        }
        if ($positiveIntegers[0] > 1) {
            return 1;
        }

        $logger->info('list: ' . print_r($positiveIntegers, true));

        $currentValue = $positiveIntegers[0];
        for ($i = 1; $i < $count; ++$i) {
            //$logger->info("currentValue = $currentValue, positiveIntegers[$i] = {$positiveIntegers[$i]}");
            if ($currentValue+1 < $positiveIntegers[$i]) {
                return $currentValue+1;
            }
            $currentValue = $positiveIntegers[$i];
        }
        return $currentValue+1;

        // for ($i = 1; $i <= $count; ++$i) {
        //     if (!isset($positiveIntegers[$i])) {
        //         return $positiveIntegers[$index] + 1;
        //     }
        //     if ($positiveIntegers[$index] === ($positiveIntegers[$i] - 1)) {
        //         ++$index;
        //         continue;
        //     }
        //     return $positiveIntegers[$index] + 1;
        //     // if ($positiveIntegers[$i] - $positiveIntegers[$index] > 1) {
        //     //     return $positiveIntegers[$index] + 1;
        //     // }
        //     //return $positiveIntegers[$i] - 1;
        // }
        // return $positiveIntegers[$count-1] + 1;
    }
}
