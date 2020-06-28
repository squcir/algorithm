<?php

namespace Sort;

/**
 * @desc 归并排序
 */
class MergeSort extends Sorter
{

    public function partition(&$arr, $start, $end)
    {
        if ($start >= $end) {
            return $arr;
        }
        // $start<=$mid && $mid+1<=$end 不会导致两个数组为空
        $mid = ($start+$end) >> 1;
        $this->partition($arr, $start, $mid);
        $this->partition($arr, $mid+1, $end);

        //合并已排序数组
        $i = $start;
        $j = $mid+1;

        $merged = [];
        while ($i <= $mid || $j <= $end) {
            if ($j > $end || ($i <= $mid && $arr[$i] <= $arr[$j])) {
                $merged[] = $arr[$i];
                $i++;
            } elseif ($i > $mid || ($j <= $end && $arr[$i] > $arr[$j])) {
                $merged[] = $arr[$j];
                $j++;
            }
        }

        foreach ($merged as $k => $v) {
            $arr[$k+$start] = $v;
        }

        return $arr;
    }

    public function sort($arr): array
    {
        $num = count($arr);
        $arr = $this->partition($arr, 0, $num-1);
        return $arr;
    }

}