<?php

namespace Sort;

/**
 * 是否稳定排序
 *
 */
abstract class Sorter
{

    protected static $strategies = [];

    public static function instance(): Sorter
    {
        if (!isset(self::$strategies[static::class])) {
            self::$strategies[static::class] = new static;
        }
        return self::$strategies[static::class];
    }

    /**
     * @param array $arr
     * @return array
     */
    abstract function sort($arr): array;

    protected function swap(&$left, &$right)
    {
        list($left, $right) = [$right, $left];
    }

}