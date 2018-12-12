<?php


namespace MOrtola\UsdaFoodComposition\Model;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class QuantityTest extends TestCase
{
    /**
     * @var Quantity
     */
    protected $quantity;

    /**
     * @var PhysicalQuantityInterface
     */
    protected $physicalQuantity;

    public function setUp()
    {
        $this->physicalQuantity = new Mass(2, 'g');
        $this->quantity = new Quantity($this->physicalQuantity);
    }

    public function testToNativeUnit()
    {
        Assert::assertEquals(
            $this->quantity->toNativeUnit(),
            $this->physicalQuantity->toNativeUnit()
        );
    }

    public function testToString()
    {
        Assert::assertEquals(
            $this->quantity->__toString(),
            $this->physicalQuantity->__toString()
        );
    }

    public function testAdd()
    {
        Assert::assertEquals(
            $this->physicalQuantity->add($this->physicalQuantity),
            $this->quantity->add($this->physicalQuantity)
        );
    }

    public function testSubtract()
    {
        Assert::assertEquals(
            $this->physicalQuantity->subtract($this->physicalQuantity),
            $this->quantity->subtract($this->physicalQuantity)
        );
    }

    public function testIsEquivalentQuantity()
    {
        Assert::assertEquals(
            $this->physicalQuantity->isEquivalentQuantity($this->physicalQuantity),
            $this->quantity->isEquivalentQuantity($this->physicalQuantity)
        );
    }
}
