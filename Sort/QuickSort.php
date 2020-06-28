<?php

namespace Sort;

/**
 * @desc 快速排序
 */
class QuickSort extends Sorter
{

    /**
     * @desc 原地排序
     */
    protected function partition(&$arr, $start, $end)
    {
        if ($start >= $end) {
            return ;
        }
        $left = $start;
        $right = $end;
        $p = $arr[$left];
        while ($start < $end) {
            while ($arr[$end] >= $p && $start < $end) {
                $end--;
            }
            while ($arr[$start] <= $p && $start < $end) {
                $start++;
            }
            if ($start < $end) {
                $this->swap($arr[$start], $arr[$end]);
            }
        }
        //调整基准元素的位置
        if ($left != $start) {
            $this->swap($arr[$start], $arr[$left]);
        }
        //递归基准元素左右两遍数组
        $this->partition($arr, $left, $start-1);
        $this->partition($arr, $start+1, $right);
    }

    public function sort($arr): array
    {
        $num = count($arr);
        $this->partition($arr, 0, $num-1);
        return $arr;
    }

}