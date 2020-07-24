<?php

namespace App\Explore\SingleNumber3;

require_once 'app/bootstrap.php';

class SingleNumber3 {

    /**
     * Single Number III
     *
     * Given an array of numbers nums,
     * in which exactly two elements appear only once and all the other elements appear exactly twice.
     * Find the two elements that appear only once.
     * @param array | int[] $nums
     * @return array | int[]
     */
    public function singleNumber(array $nums)
    {
        $count = count($nums);
        if ($count <= 1) {
            return [];
        }
        if ($count === 2) {
            return $nums;
        }
        if ($count === 3) {
            return [];
        }

        /**
         * keyに追加
         * すでにkeyがある場合keyを削除（2個以上でないルールなのでOKのはず）
         * array_valuesをかけて配列返す
         */
        $singleNumbers = [];
        foreach ($nums as $num) {
            if (array_key_exists($num, $singleNumbers)) {
                ++$singleNumbers[$num];
            } else {
                $singleNumbers[$num] = 1;
            }
        }

        $output = array_filter($singleNumbers, function($numCount){
            return $numCount === 1;
        });
        return array_keys($output);
    }
}
