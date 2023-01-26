<?php
namespace app\Models;

use app\AbstractClasses\Tree;

class PearTree extends Tree
{
    private static string $className = "PearTree";
    protected const MIN_FRUITS = 0;
    protected const MAX_FRUITS = 20;

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
        return rand(130, 170);
    }
}