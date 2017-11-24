<?php

namespace ShapeGen;

/**
 * Class for Shape Generator
 */
class ShapeGen {

    /**
     * Shape factory
     * @var \ShapeGen\ShapeFactoryInterface 
     */
    private $shapeFactory;

    /**
     * Sets shape factory
     * @param \ShapeGen\ShapeFactoryInterface $shapeFactory
     */
    public function __construct(ShapeFactoryInterface $shapeFactory = null) {
        $this->shapeFactory = $shapeFactory ?? new ShapeFactory();
    }

    /**
     * Generates new Shape
     * @param string $shapeName
     * @param type $shapeAttrs
     * @return string
     */
    public function generate(string $shapeName, ...$shapeAttrs): string {
        return $this->shapeFactory->create($shapeName, ...$shapeAttrs)->generate();
    }

}
