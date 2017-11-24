<?php

namespace ShapeGen\Shape;

use ShapeGen\Util\ReflectionClass;
use ShapeGen\Util\FillingCount;

/**
 * @coversDefaultClass \ShapeGen\Shape\SquareShape
 */
class SquareShapeTest extends \PHPUnit\Framework\TestCase {

    private $shape;
    private $charsInFirstLine;

    public function setUp() {
        $this->shape = new SquareShape(25, "S");
        $this->charsInFirstLine = $this->shape->getLines() * 2;
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
        $args = [1, $this->charsInFirstLine, 0];
        $out = $method->invokeArgs($this->shape, $args);

        $fillingCount = substr_count($out, $this->shape->getFilling());
        $fillingCountExpected = FillingCount::shapeSquare(
                        $this->shape->getLines(), $this->charsInFirstLine) -
                $this->charsInFirstLine;
        $this->assertEquals($fillingCountExpected, $fillingCount);
    }

    /**
     * @covers ::generate
     */
    public function testGenerate() {
        $out = $this->shape->generate();

        $this->assertStringStartsWith($this->shape->getFilling(), $out);
        $this->assertStringEndsWith($this->shape->getFilling(), $out);

        $eolCount = substr_count($out, PHP_EOL);
        $this->assertEquals($this->shape->getLines() - 1, $eolCount);

        $fillingCount = substr_count($out, $this->shape->getFilling());
        $fillingCountExpected = FillingCount::shapeSquare(
                        $this->shape->getLines(), $this->charsInFirstLine);
        $this->assertEquals($fillingCountExpected, $fillingCount);
    }

}
