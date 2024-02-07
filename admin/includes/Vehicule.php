<?php

class Voertuig{
//properties
public $wheels = 4;

public function get_properties(){
return ['wheels'=> $this->wheels];
}
}

class Fiets extends Voertuig{
    public $wheels = 2;

    public function get_properties()
    {
        return parent::get_properties();
    }
}
$fiets = new Fiets();
echo $fiets->get_properties();


?>