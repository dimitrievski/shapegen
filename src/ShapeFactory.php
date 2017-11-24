<?php

namespace ShapeGen;

/**
 * Class for Shape Factory
 */
class ShapeFactory implements ShapeFactoryInterface {

    /**
     * Creates new Shape
     * @param string $shapeName
     * @param type $shapeAttrs
     * @return \ShapeGen\Shape\Shape
     * @throws \Exception
     */
    public function create(string $shapeName, ...$shapeAttrs): \ShapeGen\Shape\Shape {
        $_shapeName = ucfirst(strtolower(trim($shapeName)));
        $shapeClass = "\\ShapeGen\\Shape\\{$_shapeName}Shape";
        if (!class_exists($shapeClass)) {
            throw new \Exception("Shape \"$shapeName\" is not supported.");
        }
        return new $shapeClass(...$shapeAttrs);
    }

}
