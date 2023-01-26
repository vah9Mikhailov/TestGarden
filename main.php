<?php

use app\Models\Garden;

require_once __DIR__ . '/vendor/autoload.php';

$map = [
    'AppleTree' => \app\Models\AppleTree::class,
    'PearTree' => \app\Models\PearTree::class,
];


$kindTreeWithCount = [
    'AppleTree' => 10,
    'PearTree' => 15,
];
$result = 0;
foreach ($kindTreeWithCount as $key => $countTree) {
    $className = $map[$key];
    $tree = new $className;
    for ($i = 0; $i < $countTree; $i++) {
        Garden::addTrees($tree);
    }
    Garden::addTrees($tree);
    $result += Garden::collectFruits();
    Garden::calculateProductsForKindTrees($tree);
    Garden::calculateWeightFruitsForKindTrees($tree);
}
