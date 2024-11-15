<?php

namespace App\Entity;

use App\Repository\CircleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CircleRepository::class)
 */
namespace App\Entity;

class Circle
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function getSurface(): float
    {
        return floor(pi() * pow($this->radius, 2)*100)/100;
    }

    public function getCircumference(): float
    {
        return floor((2 * pi() * $this->radius)*100)/100;
    }

    public function toArray(): array
    {
        return [
            'type' => "circle",
            'radius' => $this->radius,
            'surface' => $this->getSurface(),
            'circumference' => $this->getCircumference(),
        ];
    }
}
