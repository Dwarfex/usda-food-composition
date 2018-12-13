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

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

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

    public function addMeasure(Measure $measure): void
    {
        $this->measures[] = $measure;
    }

    public function getQuantity(): Quantity
    {
        return $this->quantity;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public static function isEnergy(int $id): bool
    {
        return in_array($id, [208, 268], true);
    }
}
