<?php

namespace app\Models;

use app\AbstractClasses\Tree;

class AppleTree extends Tree
{
    private static string $className = "AppleTree";
    protected const MIN_FRUITS = 40;
    protected const MAX_FRUITS = 50;

    /**
     * @return string
     */
    public static function getClassName(): string
    {
        return static::$className;
    }

    /**
     * @return int
     */
    public function getWeightOneFruits(): int
    {
        return rand(150, 180);
    }
}