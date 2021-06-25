<?php 

namespace classes;

class Circle implements IFigure, \JsonSerializable
{
    private $_radius;
    private $_area;
    
    public function __construct($radius)
    {
        $this->_radius = $radius;
        $this->area();
    }

    public function area()
    {
        $this->_area = pi() * pow($this->_radius, 2);
    }

    public function jsonSerialize()
    {
        return [
            'radius' => $this->_radius,
            'area' => $this->_area
        ];
    }
}

?>