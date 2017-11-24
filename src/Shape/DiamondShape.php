<?php

namespace ShapeGen\Shape;

/**
 * Class for Diamond Shape
 */
class DiamondShape extends Shape {

    /**
     * Generates next lines
     * @param int $i
     * @param int $charsIn
     * @param int $charsOut
     * @return string
     */
    protected function generateNextLines(int $i, int $charsIn, int $charsOut): string {
        if ($i < $this->getMiddleLine()) {
            return $this->generateLines($i + 1, $charsIn + 4, $charsOut - 2);
        } else {
            return $this->generateLines($i + 1, $charsIn - 4, $charsOut + 2);
        }
    }

    /**
     * Generates Diamond
     * @return string
     */
    public function generate(): string {
        return $this->generateLines(1, 1, $this->getLines() - 1);
    }

}
