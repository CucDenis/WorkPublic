<?php 
$nume = "Cuc Denis web application  ";
echo($nume);


class Masina {

    private $brand;
    public $model;

    function __construct($aBrand, $aModel){
        $this->setBrand($aBrand);
        $this->model = $aModel;
    }

    function getBrand(){
        return $this->brand;
    }

    function setBrand($value){
        if($value != 'BMW' || $value != 'Mercedes')
        {
            $this->brand = $value;
        }
    }
}


function move(){
    return 'moving';
}

$fordFocus = new Masina('Ford', 'Focus');
echo $fordFocus->getBrand();
echo move();


$sir = array();
$index = 0;

while($index < 6){
    $sir[$index] = $index;
    $index++;
}

for($i=0; $i < count($sir); $i++){
    echo($sir[$i]);
}

?>