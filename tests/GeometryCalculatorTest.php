<?php

namespace App\Tests;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Service\GeometryCalculator;
use PHPUnit\Framework\TestCase;

class GeometryCalculatorTest extends TestCase
{
    public function testSumAreas()
    {
        $circle = new Circle(8);
        $triangle = new Triangle(3, 4, 5);

        $calculator = new GeometryCalculator();
        $this->assertEquals(207.06, $calculator->sumAreas($circle, $triangle));
    }

    public function testSumDiameters()
    {
        $circle = new Circle(8);
        $triangle = new Triangle(3, 4, 5);

        $calculator = new GeometryCalculator();
        $this->assertEquals(28, $calculator->sumDiameters($circle, $triangle));
    }

}
