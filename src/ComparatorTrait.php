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
        uasort($objects, function (self $a, self $b) {
            /**
             * @var $a $this
             * @var $b $this
             */
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
        uasort($objects, function (self $a, self $b) {
            /**
             * @var $a $this
             * @var $b $this
             */
            return -1 * $a->compare($b);
        });
    }

    /**
     * Determine if this object is logically equal to the given one.
     *
     * @param self $other
     * @return bool
     */
    public function isEqual(self $other)
    {
        return $this->compare($other) === 0;
    }

    /**
     * Determine if this object is logically less than the given one.
     *
     * @param self $other
     * @return bool
     */
    public function isLessThan(self $other)
    {
        return $this->compare($other) === -1;
    }

    /**
     * Determine if this object is logically greater than the given one.
     *
     * @param self $other
     * @return bool
     */
    public function isGreaterThan(self $other)
    {
        return $this->compare($other) === 1;
    }
}
