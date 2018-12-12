<?php


namespace MOrtola\UsdaFoodComposition\Model;

use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class Quantity implements PhysicalQuantityInterface
{
    /**
     * @var PhysicalQuantityInterface
     */
    private $physicalQuantity;

    /**
     * @param PhysicalQuantityInterface $physicalQuantity
     */
    public function __construct(PhysicalQuantityInterface $physicalQuantity)
    {
        $this->physicalQuantity = $physicalQuantity;
    }

    /**
     * {@inheritdoc}
     */
    public function toUnit($unit): float
    {
        return $this->physicalQuantity->toUnit($unit);
    }

    /**
     * {@inheritdoc}
     */
    public function toNativeUnit(): float
    {
        return $this->physicalQuantity->toNativeUnit();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return $this->physicalQuantity->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function add(PhysicalQuantityInterface $quantity): PhysicalQuantityInterface
    {
        return $this->physicalQuantity->add($quantity);
    }

    /**
     * {@inheritdoc}
     */
    public function subtract(PhysicalQuantityInterface $quantity): PhysicalQuantityInterface
    {
        return $this->physicalQuantity->subtract($quantity);
    }

    /**
     * {@inheritdoc}
     */
    public function isEquivalentQuantity(PhysicalQuantityInterface $testQuantity): bool
    {
        return $this->physicalQuantity->isEquivalentQuantity($testQuantity);
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return substr(strrchr((string)$this->physicalQuantity, ' '), 1);
    }

    /**
     * @return string
     */
    public function getPhysicalQuantityClass(): string
    {
        return get_class($this->physicalQuantity);
    }
}
