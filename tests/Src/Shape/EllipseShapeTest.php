<?php

namespace ShapeGen\Shape;

use ShapeGen\Util\FillingCount;

/**
 * @coversDefaultClass \ShapeGen\Shape\EllipseShape
 */
class EllipseShapeTest extends \PHPUnit\Framework\TestCase {

    private $shape;
    private $charsInFirstLine;

    public function setUp() {
        $this->shape = new EllipseShape(25, "E");
        $this->charsInFirstLine = $this->shape->getLines() * 2;
    }

    public function tearDown() {
        $this->shape = null;
        $this->charsInFirstLine = null;
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
