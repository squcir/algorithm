<?php

namespace Sort;

/**
 * @desc 冒泡排序
 */
class BubbleSort extends Sorter
{

    /**
     * @desc 可记录每趟冒泡交换的次数，若为0，则全部有序
     */
    public function sort($arr): array
    {
        $num = count($arr);

        $index = $num-1;

        while ($index >= 1) {
            for ($i=1; $i<=$index; $i++) {
                //将大值往后冒
                if ($arr[$i-1]>$arr[$i]) {
                    $this->swap($arr[$i-1], $arr[$i]);
                }
            }
            $index--;
        }

        return $arr;
    }

}