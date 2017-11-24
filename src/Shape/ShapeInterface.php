<?php

namespace ShapeGen\Shape;

/**
 * Interface for Shape
 */
interface ShapeInterface {

    /**
     * Sets attributes
     * @param type $attrs
     */
    public function setAttrs(...$attrs);

    /**
     * Sets lines
     * @param int $lines
     */
    public function setLines(int $lines);

    /**
     * Gets lines
     * @return int
     */
    public function getLines(): int;

    /**
     * Sets filling
     * @param string $filling
     */
    public function setFilling(string $filling);

    /**
     * Gets filling
     * @return string
     */
    public function getFilling(): string;
}
