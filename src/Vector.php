<?php

namespace App;

class Vector
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    // Длина вектора
    public function length()
    {
        return sqrt($this->x * $this->x + $this->y * $this->y);
    }

    // Проверка на нулевой вектор
    public function isZero()
    {
        return $this->x == 0 && $this->y == 0;
    }

    // Проверка на перпендикулярность другому вектору
    public function isPerpendicularTo(Vector $other)
    {
        // Скалярное произведение должно быть равно 0
        return ($this->x * $other->x + $this->y * $other->y) == 0;
    }

    // Перенос точки на вектор
    public function applyToPoint(Point $point)
    {
        $point->moveX($this->x);
        $point->moveY($this->y);
    }

    public function __toString()
    {
        return "Vector(x: {$this->x}, y: {$this->y})";
    }
}
