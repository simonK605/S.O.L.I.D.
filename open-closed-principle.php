<?php

// Software entities (classes, modules, functions, etc.) should be open for extension but closed for modification.

// In this initial example, the DiscountCalculator class has a method to calculate discounts
// based on a condition (e.g., total order amount). However,
// if we need to add a new type of discount, we would need to modify the calculateDiscount method.

class Rectangle
{
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
}
class AreaCalculator
{
    public function calculateArea($shapes)
    {
        $area = 0;
        foreach ($shapes as $shape) {
            if ($shape instanceof Rectangle) {
                $area += $shape->width * $shape->height;
            }
            // Add more conditions for other shapes (e.g., Circle, Triangle) in the future
        }
        return $area;
    }
}





// In this improved example, the code is open for extension (we can add new discount strategies by
// creating new classes implementing DiscountStrategy), but closed for modification
// (we don't need to modify the DiscountCalculator class when adding new discount strategies).

// This adheres to the Open/Closed Principle by allowing the system to be extended without
// modifying existing code. Now, to add a new discount strategy, we can create a new class
// implementing DiscountStrategy without changing the DiscountCalculator class.

interface Shape
{
    public function area();
}

class Rectangle implements Shape
{
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}

class Circle implements Shape
{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return pi() * pow($this->radius, 2);
    }
}

class AreaCalculator
{
    public function calculateArea($shapes)
    {
        $area = 0;
        foreach ($shapes as $shape) {
            if ($shape instanceof Shape) {
                $area += $shape->area();
            }
        }
        return $area;
    }
}
