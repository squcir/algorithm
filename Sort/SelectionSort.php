<?php

namespace Sort;

/**
 * @desc 选择排序
 */
class SelectionSort extends Sorter
{

    public function sort($arr): array
    {
        $num = count($arr);

        $index = $num-1;

        while ($index >= 1) {
            $maxIndex = 0;
            //记录最大元素的下标
            for ($i=1; $i<= $index; $i++) {
                if ($arr[$i] > $arr[$maxIndex]) {
                    $maxIndex = $i;
                }
            }

            //交换到数组末尾
            if ($maxIndex != $index) {
                $this->swap($arr[$maxIndex], $arr[$index]);
            }

            $index--;
        }

        return $arr;
    }

}