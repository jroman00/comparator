<?php

namespace Jroman00\Comparator;

trait ComparatorTrait
{
    /**
     * Compare this object to the given one.
     *
     * @param ComparatorTrait $other
     * @return int -1|0|1
     */
    abstract public function compare(ComparatorTrait $other);

    /**
     * Sort the given array of objects in ascending order based off of the compare(...) method.
     *
     * @param array $objects
     */
    public static function sortAscending(array &$objects)
    {
        uasort($objects, function ($a, $b) {
            return $a->compare($b);
        });
    }

    /**
     * Sort the given array of objects in descending order based off of the compare(...) method.
     *
     * @param array $objects
     */
    public static function sortDescending(array &$objects)
    {
        uasort($objects, function ($a, $b) {
            return -1 * $a->compare($b);
        });
    }

    /**
     * Assert that this object is equal to the given one.
     *
     * @param self $other
     * @return bool
     */
    public function assertSame(self $other)
    {
        return $this->compare($other) === 0;
    }

    /**
     * Assert that this object is less than the given one.
     *
     * @param self $other
     * @return bool
     */
    public function assertLessThan(self $other)
    {
        return $this->compare($other) === -1;
    }

    /**
     * Assert that this object is greater than the given one.
     *
     * @param self $other
     * @return bool
     */
    public function assertGreaterThan(self $other)
    {
        return $this->compare($other) === 1;
    }
}
