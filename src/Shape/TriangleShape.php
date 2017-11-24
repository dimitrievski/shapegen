<?php

namespace ShapeGen\Shape;

/**
 * Class for Triangle Shape
 */
class TriangleShape extends Shape {

    /**
     * Generates next lines
     * @param int $i
     * @param int $charsIn
     * @param int $charsOut
     * @return string
     */
    protected function generateNextLines(int $i, int $charsIn, int $charsOut): string {
        return $this->generateLines($i + 1, $charsIn + 2, $charsOut - 1);
    }

    /**
     * Generates Triangle
     * @return string
     */
    public function generate(): string {
        return $this->generateLines(1, 1, $this->getLines() - 1);
    }

}
