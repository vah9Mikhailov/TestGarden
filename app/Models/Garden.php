<?php

namespace app\Models;

use app\AbstractClasses\Tree;

class Garden
{
    public static array $trees = [];
    public static int $id = 0;


    /**
     * @param Tree $tree
     * @return array
     */
    public static function addTrees(Tree $tree): array
    {
        $weightFruits = 0;
        $countFruits = $tree->getFruits();
        if ($countFruits) {
            for ($i = 0; $i < $countFruits; $i++){
                $weightFruits += $tree->getWeightOneFruits();
            }
        }

        return self::$trees[] = [
                            'idTree' => ++self::$id,
                            'kindTree' => $tree,
                            'countFruits' => $countFruits,
                            'weightFruits' => $weightFruits/1000
                        ];
    }

    /**
     * @return array
     */
    public static function getTrees(): array
    {
        return self::$trees;
    }

    /**
     * @return void
     */
    public static function collectFruits(): int
    {
        $fruits = 0;
        foreach (self::getTrees() as $value) {
            $fruits += $value['countFruits'];
        }

        return $fruits;
    }

    /**
     * @param Tree $tree
     * @return void
     */
    public static function calculateProductsForKindTrees(Tree $tree): void
    {
        $fruits = 0;
        foreach (self::getTrees() as $value) {
            if ($value['kindTree'] == $tree) {
                $fruits += $value['countFruits'];
            }
        }
        echo sprintf('Собрано всего %d фруктов с %s', $fruits, $tree::getClassName()) . "\n";

    }

    /**
     * @param Tree $tree
     */
    public static function calculateWeightFruitsForKindTrees(Tree $tree)
    {
        $weightFruits = 0;
        foreach (self::getTrees() as $value) {
            if ($value['kindTree'] == $tree) {
                $weightFruits += $value['weightFruits'];
            }
        }
        echo sprintf(
            'Общий вес собранных фруктов составляет %g кг c %s',
            $weightFruits,
            $tree::getClassName()
            ) . "\n";
    }







}