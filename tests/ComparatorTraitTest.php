<?php

namespace Jroman00\Comparator;

use Jroman00\Comparator\Stubs\IntegerComparatorStub;
use PHPUnit_Framework_TestCase;

class ComparatorTraitTest extends PHPUnit_Framework_TestCase
{
    /**
     * Data provider for testAssertSame.
     *
     * @return array
     */
    public function testAssertSameDataProvider()
    {
        return [
            [true, 2, 2],
            [true, -2, -2],
            [true, 0, 0],
            [false, -2, 0],
            [false, 2, 0],
            [false, 2, 3],
        ];
    }

    /**
     * Test assertSame() method.
     *
     * @dataProvider testAssertSameDataProvider
     */
    public function testAssertSame($expected, $aInteger, $bInteger)
    {
        $a = new IntegerComparatorStub($aInteger);
        $b = new IntegerComparatorStub($bInteger);

        $this->assertSame($expected, $a->assertSame($b));
    }

    /**
     * Data provider for testAssertLessThan.
     *
     * @return array
     */
    public function testAssertLessThanDataProvider()
    {
        return [
            [false, 2, 2],
            [false, -2, -2],
            [false, 0, 0],
            [true, -2, 0],
            [false, 2, 0],
            [true, 2, 3],
        ];
    }

    /**
     * Test assertLessThan() method.
     *
     * @dataProvider testAssertLessThanDataProvider
     */
    public function testAssertLessThan($expected, $aInteger, $bInteger)
    {
        $a = new IntegerComparatorStub($aInteger);
        $b = new IntegerComparatorStub($bInteger);

        $this->assertSame($expected, $a->assertLessThan($b));
    }

    /**
     * Data provider for testAssertGreaterThan.
     *
     * @return array
     */
    public function testAssertGreaterThanDataProvider()
    {
        return [
            [false, 2, 2],
            [false, -2, -2],
            [false, 0, 0],
            [false, -2, 0],
            [true, 2, 0],
            [false, 2, 3],
        ];
    }

    /**
     * Test assertGreaterThan() method.
     *
     * @dataProvider testAssertGreaterThanDataProvider
     */
    public function testAssertGreaterThan($expected, $aInteger, $bInteger)
    {
        $a = new IntegerComparatorStub($aInteger);
        $b = new IntegerComparatorStub($bInteger);

        $this->assertSame($expected, $a->assertGreaterThan($b));
    }

    /**
     * Test sortAscending() method.
     */
    public function testSortAscending()
    {
        $c4 = new IntegerComparatorStub(9);
        $c3 = new IntegerComparatorStub(4);
        $c1 = new IntegerComparatorStub(-3);
        $c2 = new IntegerComparatorStub(0);
        $c6 = new IntegerComparatorStub(100);
        $c5 = new IntegerComparatorStub(15);

        $array = [
            '4' => $c4,
            '3' => $c3,
            '1' => $c1,
            '2' => $c2,
            '6' => $c6,
            '5' => $c5,
        ];

        IntegerComparatorStub::sortAscending($array);

        $this->assertSame($array, [
            '1' => $c1,
            '2' => $c2,
            '3' => $c3,
            '4' => $c4,
            '5' => $c5,
            '6' => $c6,
        ]);
    }

    /**
     * Test sortDescending() method.
     */
    public function testSortDescending()
    {
        $c4 = new IntegerComparatorStub(9);
        $c3 = new IntegerComparatorStub(4);
        $c1 = new IntegerComparatorStub(-3);
        $c2 = new IntegerComparatorStub(0);
        $c6 = new IntegerComparatorStub(100);
        $c5 = new IntegerComparatorStub(15);

        $array = [
            '4' => $c4,
            '3' => $c3,
            '1' => $c1,
            '2' => $c2,
            '6' => $c6,
            '5' => $c5,
        ];

        IntegerComparatorStub::sortDescending($array);

        $this->assertSame($array, [
            '6' => $c6,
            '5' => $c5,
            '4' => $c4,
            '3' => $c3,
            '2' => $c2,
            '1' => $c1,
        ]);
    }
}
