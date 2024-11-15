<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Service\GeometryCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    private GeometryCalculator $calculator;

    public function __construct(GeometryCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @Route("/circle/{radius}", methods={"GET"})
     */
    public function circle(float $radius): JsonResponse
    {
        $circle = new Circle($radius);
        return $this->json($circle->toArray());
    }

    /**
     * @Route("/triangle/{a}/{b}/{c}", methods={"GET"})
     */
    public function triangle(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle($a, $b, $c);
        return $this->json($triangle->toArray());
    }

    /**
     * @Route("/sum-areas/{radius}/{a}/{b}/{c}", methods={"GET"})
     */
    public function sumAreas(float $radius, float $a, float $b, float $c): JsonResponse
    {
        $circle = new Circle($radius);
        $triangle = new Triangle($a, $b, $c);
        $sum = $this->calculator->sumAreas($circle, $triangle);

        return $this->json(['sum_of_areas' => $sum]);
    }

    /**
     * @Route("/sum-diameters/{radius}/{a}/{b}/{c}", methods={"GET"})
     */
    public function sumDiameters(float $radius, float $a, float $b, float $c): JsonResponse
    {
        $circle = new Circle($radius);
        $triangle = new Triangle($a, $b, $c);
        $sum = $this->calculator->sumDiameters($circle, $triangle);

        return $this->json(['sum_of_diameters' => $sum]);
    }
}
