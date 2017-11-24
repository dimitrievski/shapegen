<?php

namespace ShapeGen\Shape;

/**
 * Class for Square Shape
 */
class SquareShape extends Shape {

    /**
     * Generates next lines
     * @param int $i
     * @param int $charsIn
     * @param int $charsOut
     * @return string
     */
    protected function generateNextLines(int $i, int $charsIn, int $charsOut): string {
        return $this->generateLines($i + 1, $charsIn, $charsOut);
    }

    /**
     * Generates Square
     * @return string
     */
    public function generate(): string {
        return $this->generateLines(1, $this->getLines() * 2, 0);
    }

}
