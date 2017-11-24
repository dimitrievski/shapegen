<?php

namespace ShapeGen\Shape;

/**
 * Class for Rectangle Shape
 */
class RectangleShape extends SquareShape {

    /**
     * Generates Rectangle
     * @return string
     */
    public function generate(): string {
        return $this->generateLines(1, $this->getLines() * 4, 0);
    }

}
