<?php

namespace classes;

class Triangle implements IFigure, \JsonSerializable
{
    private $_side1;
    private $_side2;
    private $_side3;
    private $_area;
    
    public function __construct($side1, $side2, $side3)
    {
        $this->_side1 = $side1;
        $this->_side2 = $side2;
        $this->_side3 = $side3;
        $this->area();
    }

    public function area() 
    {   

        $halfPerimeter = 0.5 * ($this->_side1 + $this->_side2 + $this->_side3);
        $halfPerimeterSide1 = ($halfPerimeter - $this->_side1);
        $halfPerimeterSide2 = ($halfPerimeter - $this->_side2);
        $halfPerimeterSide3 = ($halfPerimeter - $this->_side3);
        $this->_area =  sqrt($halfPerimeter * $halfPerimeterSide1 * $halfPerimeterSide2 * $halfPerimeterSide3);
        
        if (is_nan($this->_area)) {
            $this->_area = 0;
        }
    }

    public function jsonSerialize()
    {
        return [
            'side1' => $this->_side1,
            'side2' => $this->_side2,
            'side3' => $this->_side3,
            'area' => $this->_area
        ];
    }
}

?>