<?php

namespace ShapeGen\Shape;

/**
 * Class for Ellipse Shape
 */
class EllipseShape extends CircleShape {

    /**
     * Generates Ellipse
     * @return string
     */
    public function generate(): string {
        return $this->generateLines(1, $this->getLines() * 2, $this->getMiddleLine() - 1);
    }

}
