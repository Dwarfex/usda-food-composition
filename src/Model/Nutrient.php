<?php

namespace MOrtola\UsdaFoodComposition\Model;

class Nutrient
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $derivation;

    /**
     * @var Source[]
     */
    private $sources;

    /**
     * @var Measure[]
     */
    private $measures;

    /**
     * @var Quantity
     */
    private $quantity;

    /**
     * @var string
     */
    private $group;

    /**
     * @param int $id
     * @param string $name
     * @param string $derivation
     * @param string $group
     * @param Quantity $quantity
     */
    public function __construct(int $id, string $name, string $derivation, string $group, Quantity $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->derivation = $derivation;
        $this->group = $group;
        $this->quantity = $quantity;
        $this->sources = [];
        $this->measures = [];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDerivation(): string
    {
        return $this->derivation;
    }

    /**
     * @return Source[]
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    /**
     * @param Source $source
     */
    public function addSource(Source $source): void
    {
        $this->sources[$source->getId()] = $source;
    }

    /**
     * @return Measure[]
     */
    public function getMeasures(): array
    {
        return $this->measures;
    }

    /**
     * @param Measure $measure
     */
    public function addMeasure(Measure $measure): void
    {
        $this->measures[] = $measure;
    }

    /**
     * @return Quantity
     */
    public function getQuantity(): Quantity
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }
}
