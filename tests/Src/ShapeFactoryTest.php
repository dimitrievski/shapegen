<?php

namespace ShapeGen;

/**
 * @coversDefaultClass \ShapeGen\ShapeFactory
 */
class ShapeFactoryTest extends \PHPUnit\Framework\TestCase {

    private $shapeFactory;

    public function setUp() {
        $this->shapeFactory = new ShapeFactory();
    }

    public function tearDown() {
        $this->shapeFactory = null;
    }

    /**
     * @covers ::create
     */
    public function testCreateInvalidShape() {
        $shapeName = "test";
        $this->expectExceptionMessage("Shape \"$shapeName\" is not supported.");

        $this->shapeFactory->create($shapeName);
    }

    /**
     * @covers ::create
     */
    public function testCreateValidShape() {
        $shape = $this->shapeFactory->create("triangle");

        $this->assertInstanceOf(Shape\TriangleShape::class, $shape);
    }

}
