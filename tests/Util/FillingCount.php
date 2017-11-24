<?php

namespace ShapeGen\Util;

/**
 * FillingCount
 */
class FillingCount {

    /**
     * Counts filling chars for Circle and Ellipse
     * @param int $lines
     * @param int $charsInFirstLine
     * @return int
     */
    public static function shapeCircle(int $lines, int $charsInFirstLine): int {
        $middleLine = ($lines + 1) / 2;

        $charsInSecondLine = $charsInFirstLine + 4;
        $tmp = $charsInSecondLine;
        $charsInToMiddleLine = 0;
        for ($i = 2; $i < $middleLine - 1; ++$i) {
            $tmp += 2;
            $charsInToMiddleLine += ($tmp * 2);
        }
        $charsInToMiddleLine += $tmp;

        return ($charsInFirstLine * 2) +
                ($charsInSecondLine * 2) +
                $charsInToMiddleLine;
    }

    /**
     * Counts filling chars for Diamond
     * @param int $lines
     * @return int
     */
    public static function shapeDiamond(int $lines): int {
        return pow($lines, 2) - $lines + 1;
    }

    /**
     * Counts filling chars for Square and Rectangle
     * @param int $lines
     * @param int $charsInFirstLine
     * @return int
     */
    public static function shapeSquare(int $lines, int $charsInFirstLine): int {
        return $lines * $charsInFirstLine;
    }

    /**
     * Counts filling chars for Triangle
     * @param int $lines
     * @return int
     */
    public static function shapeTriangle(int $lines): int {
        return pow($lines, 2);
    }

}
