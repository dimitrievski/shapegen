<?php

namespace ShapeGen;

/**
 * Interface for Shape Factory
 */
interface ShapeFactoryInterface {

    /**
     * Creates new Shape
     * @param string $shapeName
     * @param type $shapeAttrs
     * @return \ShapeGen\Shape\Shape
     */
    public function create(string $shapeName, ...$shapeAttrs): \ShapeGen\Shape\Shape;
}
