<?php
/**
 * Bridge Pattern example
 *
 * @author    Christian Bergau <cbergau86@gmail.com>
 * @copyright Free for all
 * @link      http://en.wikipedia.org/wiki/Bridge_pattern
 */

interface DrawingAPI
{
    public function drawCircle($x, $y, $radius);
}

class DrawingAPI1 implements DrawingAPI
{
    public function drawCircle($x, $y, $radius)
    {
        echo "API1.circle at " . $x . ":" . $y . " radius " . $radius . "<br/>";
    }
}

class DrawingAPI2 implements DrawingAPI
{
    public function drawCircle($x, $y, $radius)
    {
        echo "API2.circle at " . $x . ":" . $y . " radius " . $radius . "<br/>";
    }
}

abstract class Shape
{
    protected $drawingAPI;

    protected function Shape(DrawingAPI $drawingAPI)
    {
        $this->drawingAPI = $drawingAPI;
    }
}

class CircleShape extends Shape
{
    private $x;
    private $y;
    private $radius;

    public function CircleShape(
        $x,
        $y,
        $radius,
        DrawingAPI $drawingAPI
    ) {
        parent::Shape($drawingAPI);
        $this->x      = $x;
        $this->y      = $y;
        $this->radius = $radius;
    }

    public function draw()
    {
        $this->drawingAPI->drawCircle(
            $this->x,
            $this->y,
            $this->radius
        );
    }

    public function resizeByPercentage($dPct)
    {
        $this->radius *= $dPct;
    }
}

$aShapes = array(
    new CircleShape(1, 3, 7, new DrawingAPI1()),
    new CircleShape(5, 7, 11, new DrawingAPI2()),
);

foreach ($aShapes as $shapes) {
    $shapes->resizeByPercentage(2.5);
    $shapes->draw();
}
