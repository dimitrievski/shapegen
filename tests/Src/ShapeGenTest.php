<?php

namespace ShapeGen;

/**
 * @coversDefaultClass \ShapeGen\ShapeGen
 */
class ShapeGenTest extends \PHPUnit\Framework\TestCase {

    private $shapeGen;

    public function setUp() {
        $this->shapeGen = new ShapeGen();
    }

    public function tearDown() {
        $this->shapeGen = null;
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct() {
        $shapeFactory = Util\ReflectionClass::getProperty(
                        $this->shapeGen, "shapeFactory");

        $this->assertInstanceOf(
                ShapeFactory::class, $shapeFactory->getValue($this->shapeGen));
    }

    /**
     * @covers ::generate
     */
    public function testGenerate() {
        $lines = 25;
        $filling = "T";
        $generatedLines = $this->shapeGen->generate("triangle", $lines, $filling);

        $this->assertStringStartsWith(" ", $generatedLines);
        $this->assertStringEndsWith($filling, $generatedLines);

        $eolCount = substr_count($generatedLines, PHP_EOL);
        $this->assertEquals($lines - 1, $eolCount);
    }

}
