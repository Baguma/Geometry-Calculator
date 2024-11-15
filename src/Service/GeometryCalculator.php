<?php

namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;

class GeometryCalculator
{
    public function sumAreas(Circle $circle, Triangle $triangle): float
    {
        return round($circle->getSurface() + $triangle->getSurface(), 2);
    }

    public function sumDiameters(Circle $circle, Triangle $triangle): float
    {
        return (2 * $circle->getRadius()) + $triangle->getCircumference();
    }
}

