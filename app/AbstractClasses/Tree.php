<?php
namespace app\AbstractClasses;

abstract class Tree
{
    protected const MIN_FRUITS = 0;
    protected const MAX_FRUITS = 0;

    private static string $className = 'Tree';

    public static function getClassName(): string
    {
        return static::$className;
    }

    public function getFruits(): int
    {
        return rand(static::MIN_FRUITS, static::MAX_FRUITS);
    }

    abstract function getWeightOneFruits();
}