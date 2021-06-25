<?php

namespace classes;

class Rectangle implements IFigure, \JsonSerializable
{
    private $_length;
    private $_width;
    private $_area;
    
    public function __construct($length, $width)
    {
        $this->_length = $length;
        $this->_width = $width;
        $this->area();
    }

    public function area() 
    {
        $this->_area = $this->_length * $this->_width;  
    }

    public function jsonSerialize()
    {
        return [
            'length' => $this->_length,
            'width' => $this->_width,
            'area' => $this->_area
        ];
    }
}

?>