<?php

namespace Jroman00\Comparator\Stubs;

use Jroman00\Comparator\ComparatorTrait;

class IntegerComparatorStub
{
    use ComparatorTrait;

    /**
     * @var int
     */
    private $integer;

    /**
     * @param int $integer
     */
    public function __construct($integer)
    {
        $this->integer = (int) $integer;
    }

    /**
     * @param self $other
     * @return int -1|0|1
     */
    public function compare(self $other)
    {
        if ($this->integer === $other->integer) {
            return 0;
        }

        return $this->integer < $other->integer ? -1 : 1;
    }
}
