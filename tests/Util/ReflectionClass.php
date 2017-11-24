<?php

namespace ShapeGen\Util;

/**
 * ReflectionClass
 */
class ReflectionClass {

    /**
     * Gets private or protected method
     * @param object|string $object
     * @param string $methodName
     * @return mixed
     */
    public static function getMethod($object, string $methodName) {
        $refClass = new \ReflectionClass($object);
        $refMethod = $refClass->getMethod($methodName);
        $refMethod->setAccessible(true);
        return $refMethod;
    }

    /**
     * Gets private or protected property
     * @param object|string $object
     * @param string $propertyName
     * @return mixed
     */
    public static function getProperty($object, string $propertyName) {
        $refClass = new \ReflectionClass($object);
        $refProperty = $refClass->getProperty($propertyName);
        $refProperty->setAccessible(true);
        return $refProperty;
    }

}
