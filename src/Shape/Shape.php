<?php

namespace ShapeGen\Shape;

/**
 * Class for Shape
 */
abstract class Shape implements ShapeInterface {

    /**
     * Number of lines
     * @var int 
     */
    private $lines;

    /**
     * Filling character
     * @var string 
     */
    private $filling;

    /**
     * Middle line
     * @var int
     */
    private $middleLine;

    /**
     * Sets attributes
     * @param type $attrs
     */
    public function __construct(...$attrs) {
        $this->setAttrs(...$attrs);
    }

    /**
     * Sets attributes
     * @param type $attrs
     */
    public function setAttrs(...$attrs) {
        $lines = $attrs[0] ?? 5;
        $this->setLines($lines);
        $filling = $attrs[1] ?? "X";
        $this->setFilling($filling);
    }

    /**
     * Sets lines
     * @param int $lines
     * @throws \Exception
     */
    public function setLines(int $lines) {
        if ($lines < 5 || $lines > 49) {
            throw new \Exception("The number of lines must be between 5 and 49.");
        }
        if ($lines % 2 === 0) {
            throw new \Exception("The number of lines must be an odd number.");
        }
        $this->lines = $lines;
        $this->middleLine = ($this->lines + 1) / 2;
    }

    /**
     * Gets lines
     * @return int
     */
    public function getLines(): int {
        return $this->lines;
    }

    /**
     * Sets filling
     * @param string $filling
     */
    public function setFilling(string $filling) {
        $this->filling = trim($filling)[0];
    }

    /**
     * Gets filling
     * @return string
     */
    public function getFilling(): string {
        return $this->filling;
    }

    /**
     * Gets middle line
     * @return int
     */
    protected function getMiddleLine(): int {
        return $this->middleLine;
    }

    /**
     * Generates line
     * @param int $charsIn
     * @param int $charsOut
     * @return string
     * @throws \Exception
     */
    private function generateLine(int $charsIn, int $charsOut): string {
        if ($charsIn < 0 || $charsOut < 0) {
            throw new \Exception("Both arguments have to be greater than or equal to 0.");
        }
        return str_repeat(' ', $charsOut) .
                str_repeat($this->filling, $charsIn) .
                PHP_EOL;
    }

    /**
     * Generates lines
     * @param int $i
     * @param int $charsIn
     * @param int $charsOut
     * @return string
     * @throws \Exception
     */
    protected function generateLines(int $i, int $charsIn, int $charsOut): string {
        if ($i < 1 || $i > $this->lines) {
            throw new \Exception("The iterated line must be between 1 and "
            . "{$this->lines}.");
        }
        //generate line
        $lines = $this->generateLine($charsIn, $charsOut);
        //generate next lines
        if ($i < $this->lines) {
            $lines .= $this->generateNextLines($i, $charsIn, $charsOut);
        }
        //strip EOL from the end
        return rtrim($lines);
    }

    /**
     * Generates next lines
     * @param int $i
     * @param int $charsIn
     * @param int $charsOut
     * @return string
     */
    abstract protected function generateNextLines(int $i, int $charsIn, int $charsOut): string;

    /**
     * Generates shape
     * @return string
     */
    abstract public function generate(): string;
}
