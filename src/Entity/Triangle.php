<?php

namespace App\Entity;

class Triangle
{
    private float $a;
    private float $b;
    private float $c;

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function getSurface(): float
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        return floor(sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c))*100)/100;
    }

    public function getCircumference(): float
    {
        return floor(($this->a + $this->b + $this->c)*100)/100;
    }

    public function toArray(): array
    {
        return [
            'type' => "triangle",
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c,
            'surface' => $this->getSurface(),
            'circumference' => $this->getCircumference(),
        ];
    }
}
