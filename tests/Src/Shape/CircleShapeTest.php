<?php

namespace ShapeGen\Shape;

use ShapeGen\Util\ReflectionClass;
use ShapeGen\Util\FillingCount;

/**
 * @coversDefaultClass \ShapeGen\Shape\CircleShape
 */
class CircleShapeTest extends \PHPUnit\Framework\TestCase {

    private $shape;
    private $charsInFirstLine;

    public function setUp() {
        $this->shape = new CircleShape(25, "C");
        $this->charsInFirstLine = $this->shape->getLines();
    }

    public function tearDown() {
        $this->shape = null;
        $this->charsInFirstLine = null;
    }

    /**
     * @covers ::generateNextLines
     */
    public function testGenerateNextLines() {
        $method = ReflectionClass::getMethod($this->shape, "generateNextLines");
        $middleLine = ($this->shape->getLines() + 1) / 2;
        $args = [1, $this->charsInFirstLine, $middleLine - 1];
        $out = $method->invokeArgs($this->shape, $args);

        $fillingCount = substr_count($out, $this->shape->getFilling());
        $fillingCountExpected = FillingCount::shapeCircle(
                        $this->shape->getLines(), $this->charsInFirstLine) -
                $this->charsInFirstLine;
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
        $fillingCountExpected = FillingCount::shapeCircle(
                        $this->shape->getLines(), $this->charsInFirstLine);
        $this->assertEquals($fillingCountExpected, $fillingCount);
    }

}
