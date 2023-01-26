<?php

namespace app\Models;

use PHPUnit\Framework\TestCase;

class GardenTest extends TestCase
{

    /**
     * @return array
     */
    private function addTrees(): array
    {
        $apple = [];
        $pear = [];
        for ($i = 0; $i < 5; $i++) {
            $apple[] = new AppleTree();
            $pear[] = new PearTree();
        }
        $trees = array_merge($apple, $pear);

        foreach ($trees as $tree) {
            Garden::addTrees($tree);
        }
        return $trees;
    }

    /**
     * @return void
     */
    public function testAddTrees(): void
    {
        $trees = $this->addTrees();
        $this->assertCount(count($trees), Garden::getTrees());
        $this->assertIsArray(Garden::getTrees());
    }

    /**
     * @return void
     */
    public function testCollectFruits(): void
    {
        $this->addTrees();
        $countFruits = 0;
        foreach (Garden::getTrees() as $value)
        {
            if (!empty($value['countFruits'])) {
                $countFruits += $value['countFruits'];
            }
        }
        $this->assertEquals($countFruits, Garden::collectFruits());
    }

    /**
     * @return void
     */
    public function testCalculateProductsForAppleTree()
    {
        $this->addTrees();
        $countFruits = 0;
        $apple = new AppleTree();
        foreach (Garden::getTrees() as $value)
        {
            if (!empty($value['kindTree']) && $apple instanceof $value['kindTree']) {

                $countFruits += $value['countFruits'];
            }
        }
        $this->expectOutputString(sprintf('Собрано всего %d фруктов с %s', $countFruits, $apple::getClassName()) . "\n");
        Garden::calculateProductsForKindTrees($apple);
    }

    /**
     * @return void
     */
    public function testCalculateProductsForPearTree()
    {
        $this->addTrees();
        $countFruits = 0;
        $pear = new PearTree();
        foreach (Garden::getTrees() as $value)
        {
            if (!empty($value['kindTree']) && $pear instanceof $value['kindTree']) {

                $countFruits += $value['countFruits'];
            }
        }
        $this->expectOutputString(sprintf('Собрано всего %d фруктов с %s', $countFruits, $pear::getClassName()) . "\n");
        Garden::calculateProductsForKindTrees($pear);
    }

    /**
     * @return void
     */
    public function testCalculateWeightFruitsForAppleTrees()
    {
        $this->addTrees();
        $weightFruits = 0;
        $apple = new AppleTree();
        foreach (Garden::getTrees() as $value)
        {
            if (!empty($value['kindTree']) && $apple instanceof $value['kindTree']) {
                $weightFruits += $value['weightFruits'];
            }
        }
        $this->expectOutputString(
            sprintf('Общий вес собранных фруктов составляет %g кг c %s',
                $weightFruits,
                $apple::getClassName()
            ) . "\n");
        Garden::calculateWeightFruitsForKindTrees($apple);
    }

    /**
     * @return void
     */
    public function testCalculateWeightFruitsForPearTrees()
    {
        $this->addTrees();
        $weightFruits = 0;
        $pear = new AppleTree();
        foreach (Garden::getTrees() as $value)
        {
            if (!empty($value['kindTree']) && $pear instanceof $value['kindTree']) {
                $weightFruits += $value['weightFruits'];
            }
        }
        $this->expectOutputString(
            sprintf('Общий вес собранных фруктов составляет %g кг c %s',
                $weightFruits,
                $pear::getClassName()
            ) . "\n");
        Garden::calculateWeightFruitsForKindTrees($pear);
    }

}
