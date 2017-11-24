<?php

namespace ShapeGen\Shape;

use \ShapeGen\Util\ReflectionClass;

/**
 * @coversDefaultClass \ShapeGen\Shape\Shape
 */
class ShapeTest extends \PHPUnit\Framework\TestCase {

    private $mock;

    public function setUp() {
        $this->mock = $this->getMockForAbstractClass(Shape::class);
    }

    public function tearDown() {
        $this->mock = null;
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct() {
        $this->assertInstanceOf(Shape::class, $this->mock);
    }

    /**
     * @covers ::setAttrs
     */
    public function testSetAttrs() {
        $lines = 7;
        $filling = "M";
        $this->mock->setAttrs($lines, $filling);

        $this->assertEquals($lines, $this->mock->getLines());
        $this->assertEquals($filling, $this->mock->getFilling());
    }

    /**
     * @covers ::setLines
     */
    public function testSetLinesWithInvalidNumber() {
        $this->expectExceptionMessage("The number of lines must be between 5 and 49.");

        $this->mock->setLines(1);
    }

    /**
     * @covers ::setLines
     */
    public function testSetLinesWithEvenNumber() {
        $this->expectExceptionMessage("The number of lines must be an odd number.");

        $this->mock->setLines(12);
    }

    /**
     * @covers ::getLines
     */
    public function testGetLines() {
        //default lines is 5
        $this->assertEquals(5, $this->mock->getLines());
    }

    /**
     * @covers ::setFilling
     */
    public function testSetFilling() {
        $filling = "TEST";
        $this->mock->setFilling($filling);

        $this->assertEquals($filling[0], $this->mock->getFilling());
    }

    /**
     * @covers ::getFilling
     */
    public function testGetFilling() {
        //default filling is X
        $this->assertEquals("X", $this->mock->getFilling());
    }

    /**
     * @covers ::getMiddleLine
     */
    public function testGetMiddleLine() {
        $method = ReflectionClass::getMethod($this->mock, "getMiddleLine");
        $middleLine = $method->invoke($this->mock);

        //(5 + 1) / 2
        $this->assertEquals(3, $middleLine);
    }

    /**
     * @covers ::generateLine
     */
    public function testGenerateLineWithInvalidArgs() {
        $this->expectExceptionMessage("Both arguments have to be greater than or equal to 0.");

        $method = ReflectionClass::getMethod($this->mock, "generateLine");
        $method->invokeArgs($this->mock, [0, -1]);
    }

    /**
     * @covers ::generateLine
     */
    public function testGenerateLineWithValidArgs() {
        $method = ReflectionClass::getMethod($this->mock, "generateLine");
        $line = $method->invokeArgs($this->mock, [3, 1]);

        $this->assertEquals(" XXX" . PHP_EOL, $line);
    }

    /**
     * @covers ::generateLines
     */
    public function testGenerateLinesWithInvalidArgs() {
        $this->expectExceptionMessage("The iterated line must be between 1 and "
                . "{$this->mock->getLines()}.");

        $method = ReflectionClass::getMethod($this->mock, "generateLines");
        $method->invokeArgs($this->mock, [0, 1, 1]);
    }

    /**
     * @covers ::generateLines
     */
    public function testGenerateLinesWithValidArgs() {
        $args = [1, 3, 3];
        $returnValue = "TEST";

        $this->mock->expects($this->once())
                ->method('generateNextLines')
                ->withConsecutive($args)
                ->will($this->returnValue($returnValue));

        $method = ReflectionClass::getMethod($this->mock, "generateLines");
        $lines = $method->invokeArgs($this->mock, $args);
        
        $linesExpected = "   XXX" . PHP_EOL . $returnValue;
        $this->assertEquals($linesExpected, $lines);
    }

}
