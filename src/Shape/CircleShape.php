<?php

namespace ShapeGen\Shape;

/**
 * Class for Circle Shape
 */
class CircleShape extends Shape {

    /**
     * Generates next lines
     * @param int $i
     * @param int $charsIn
     * @param int $charsOut
     * @return string
     */
    protected function generateNextLines(int $i, int $charsIn, int $charsOut): string {
        if ($i === 1) {
            return $this->generateLines($i + 1, $charsIn + 4, $charsOut - 2);
        } else if ($i < ($this->getMiddleLine() - 1)) {
            return $this->generateLines($i + 1, $charsIn + 2, $charsOut - 1);
        } else if ($i <= $this->getMiddleLine()) {
            return $this->generateLines($i + 1, $charsIn, $charsOut);
        } else if ($i < ($this->getLines() - 1)) {
            return $this->generateLines($i + 1, $charsIn - 2, $charsOut + 1);
        } else {
            return $this->generateLines($i + 1, $charsIn - 4, $charsOut + 2);
        }
    }

    /**
     * Generates Circle
     * @return string
     */
    public function generate(): string {
        return $this->generateLines(1, $this->getLines(), $this->getMiddleLine() - 1);
    }

}
