<?php 

abstract class Tree {

    public $apples = [];
    public $pears = [];

    abstract public function count();

    function sumAmount ($count, $item) {

        $count += $item[1];
        return $count;

    }

    function sumWeight ($count, $item) {

        $count += $item[2];
        return $count;

    }

}

class AppleTree extends Tree {

    public function __construct($number) {

        $weight = [150, 180];
        $amount = [40, 50];

        for ($i = 1; $i <= $number; $i++) {

            array_push($this -> apples, [$i, rand($amount[0], $amount[1]), rand($weight[0], $weight[1])]);

        }

    }

    public function count () {

        return [array_reduce($this -> apples, "parent::sumAmount"), array_reduce($this -> apples, "parent::sumWeight")];

    }


}

class PearTree extends Tree {

    public function __construct($number) {

        $weight = [130, 170];
        $amount = [0, 20];

        for ($i = 1; $i <= $number; $i++) {

            array_push($this -> pears, [$i, rand($amount[0], $amount[1]), rand($weight[0], $weight[1])]);

        }

    }

    public function count () {

        return [array_reduce($this -> pears, "parent::sumAmount"), array_reduce($this -> pears, "parent::sumWeight")];

    }

}

$getApples = new AppleTree(10);
$getPears = new PearTree(15);

echo "Кол-во яблок — " . $getApples->count()[0] . ", их вес — " . $getApples->count()[1];
echo "\nКол-во груш — " . $getPears->count()[0] . ", их вес — " . $getPears->count()[1];
