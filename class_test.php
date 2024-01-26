<?php
class cal{

    public $x;
    public $y;

    function addition($x,$y)
    {
        $this -> add=($x + $y);
        echo $this-> add."<br>";
    }

    function subtration($x,$y)
    {
        $this-> sub=($x - $y);
        echo $this-> sub."<br>";
    }

    function multiplication($x,$y)
    {
        $this->mul=($x * $y);
        echo $this->mul."<br>";
    }

    function division($x,$y)
    {
        echo $this->add=($x/$y)."<br>";
    }

}

//$addr= new cal();
//echo $addr->addition(6,7);
?>