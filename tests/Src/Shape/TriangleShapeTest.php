<?php

namespace ShapeGen\Shape;

use ShapeGen\Util\ReflectionClass;
use ShapeGen\Util\FillingCount;

/**
 * @coversDefaultClass \ShapeGen\Shape\TriangleShape
 */
class TriangleShapeTest extends \PHPUnit\Framework\TestCase {

    private $shape;

    public function setUp() {
        $this->shape = new TriangleShape(25, "T");
    }

    public function tearDown() {
        $this->shape = null;
    }

    /**
     * @covers ::generateNextLines
     */
    public function testGenerateNextLines() {
        $method = ReflectionClass::getMethod($this->shape, "generateNextLines");
        $args = [1, 1, $this->shape->getLines() - 1];
        $out = $method->invokeArgs($this->shape, $args);

        $fillingCount = substr_count($out, $this->shape->getFilling());
        $fillingCountExpected = FillingCount::shapeTriangle(
                        $this->shape->getLines()) - 1;
        $this->assertEquals($fillingCountExpected, $fillingCount);
    }

    /**
     * @covers ::generate
     */
    public function testGenerate() {
        $out = $this->shape->generate();

        $this->assertStringStartsWith(" ", $out);
        $this->assertStringEndsWith($this->shape->getFilling(), $out);

        $eolCount = substr_count($out, PHP_EOL);
        $this->assertEquals($this->shape->getLines() - 1, $eolCount);

        $fillingCount = substr_count($out, $this->shape->getFilling());
        $fillingCountExpected = FillingCount::shapeTriangle(
                        $this->shape->getLines());
        $this->assertEquals($fillingCountExpected, $fillingCount);
    }

}
