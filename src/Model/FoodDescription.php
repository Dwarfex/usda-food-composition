<?php

namespace MOrtola\UsdaFoodComposition\Model;

class FoodDescription
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $shortDescription;

    /**
     * @var string
     */
    private $databaseSource;

    /**
     * @var string
     */
    private $foodGroup;

    /**
     * @var string
     */
    private $scientificName;

    /**
     * @var string
     */
    private $commercialName;

    /**
     * @var string
     */
    private $manufacturerName;

    /**
     * @var float
     */
    private $nitrogenToProteinConversionFactor;

    /**
     * @var float
     */
    private $carbohydrateFactor;

    /**
     * @var float
     */
    private $fatFactor;

    /**
     * @var float
     */
    private $proteinFactor;

    public function __construct(string $id, string $name, string $databaseSource)
    {
        $this->id = $id;
        $this->name = $name;
        $this->databaseSource = $databaseSource;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    public function getDatabaseSource(): string
    {
        return $this->databaseSource;
    }

    public function getFoodGroup(): ?string
    {
        return $this->foodGroup;
    }

    public function setFoodGroup(string $foodGroup): void
    {
        $this->foodGroup = $foodGroup;
    }

    public function getScientificName(): ?string
    {
        return $this->scientificName;
    }

    public function setScientificName(string $scientificName): void
    {
        $this->scientificName = $scientificName;
    }

    public function getCommercialName(): ?string
    {
        return $this->commercialName;
    }

    public function setCommercialName(string $commercialName): void
    {
        $this->commercialName = $commercialName;
    }

    public function getManufacturerName(): ?string
    {
        return $this->manufacturerName;
    }

    public function setManufacturerName(string $manufacturerName): void
    {
        $this->manufacturerName = $manufacturerName;
    }

    public function getNitrogenToProteinConversionFactor(): ?float
    {
        return $this->nitrogenToProteinConversionFactor;
    }

    public function setNitrogenToProteinConversionFactor(float $nitrogenToProteinConversionFactor): void
    {
        $this->nitrogenToProteinConversionFactor = $nitrogenToProteinConversionFactor;
    }

    public function getCarbohydrateFactor(): ?float
    {
        return $this->carbohydrateFactor;
    }

    public function setCarbohydrateFactor(float $carbohydrateFactor): void
    {
        $this->carbohydrateFactor = $carbohydrateFactor;
    }

    public function getFatFactor(): ?float
    {
        return $this->fatFactor;
    }

    public function setFatFactor(float $fatFactor): void
    {
        $this->fatFactor = $fatFactor;
    }

    public function getProteinFactor(): ?float
    {
        return $this->proteinFactor;
    }

    public function setProteinFactor(float $proteinFactor): void
    {
        $this->proteinFactor = $proteinFactor;
    }
}
