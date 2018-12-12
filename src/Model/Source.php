<?php

namespace MOrtola\UsdaFoodComposition\Model;

class Source
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $authors;

    /**
     * @var string
     */
    private $volume;

    /**
     * @var string
     */
    private $issue;

    /**
     * @var int
     */
    private $publicationYear;

    /**
     * @var int
     */
    private $startPage;

    /**
     * @var int
     */
    private $endPage;

    public function __construct(int $id, string $title, string $authors)
    {
        $this->id = $id;
        $this->title = $title;
        $this->authors = $authors;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthors(): string
    {
        return $this->authors;
    }

    public function getVolume(): ?string
    {
        return $this->volume;
    }

    public function setVolume(string $volume): void
    {
        $this->volume = $volume;
    }

    public function getIssue(): ?string
    {
        return $this->issue;
    }

    public function setIssue(string $issue): void
    {
        $this->issue = $issue;
    }

    public function getPublicationYear(): ?int
    {
        return $this->publicationYear;
    }

    public function setPublicationYear(int $publicationYear): void
    {
        $this->publicationYear = $publicationYear;
    }

    public function getStartPage(): ?int
    {
        return $this->startPage;
    }

    public function setStartPage(int $startPage): void
    {
        $this->startPage = $startPage;
    }

    public function getEndPage(): ?int
    {
        return $this->endPage;
    }

    public function setEndPage(int $endPage): void
    {
        $this->endPage = $endPage;
    }
}
