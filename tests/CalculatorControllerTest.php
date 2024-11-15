<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorControllerTest extends WebTestCase
{
    public function testCircleCalculation()
    {
        $client = static::createClient();
        $client->request('GET', '/circle/8');

        $this->assertResponseIsSuccessful();
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals(201.06, $responseData['surface']);
        $this->assertEqualsWithDelta(50.26, $responseData['circumference'], 0.01);

    }

    public function testTriangleCalculation()
    {
        $client = static::createClient();
        $client->request('GET', '/triangle/3/4/5');

        $this->assertResponseIsSuccessful();
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals(6.0, $responseData['surface']);
        $this->assertEquals(12.0, $responseData['circumference']);
    }

    public function testSumAreas()
    {
        $client = static::createClient();
        $client->request('GET', '/sum-areas/8/3/4/5');

        $this->assertResponseIsSuccessful();
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals(207.06, $responseData['sum_of_areas']);
    }

    public function testSumDiameters()
    {
        $client = static::createClient();
        $client->request('GET', '/sum-diameters/8/3/4/5');

        $this->assertResponseIsSuccessful();
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals(28, $responseData['sum_of_diameters']);
    }


}
