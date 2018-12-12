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

    /**
     * @param int $id
     * @param string $title
     * @param string $authors
     */
    public function __construct(int $id, string $title, string $authors)
    {
        $this->id = $id;
        $this->title = $title;
        $this->authors = $authors;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAuthors(): string
    {
        return $this->authors;
    }

    /**
     * @return string
     */
    public function getVolume(): ?string
    {
        return $this->volume;
    }

    /**
     * @param string $volume
     */
    public function setVolume(string $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * @return string
     */
    public function getIssue(): ?string
    {
        return $this->issue;
    }

    /**
     * @param string $issue
     */
    public function setIssue(string $issue): void
    {
        $this->issue = $issue;
    }

    /**
     * @return int
     */
    public function getPublicationYear(): ?int
    {
        return $this->publicationYear;
    }

    /**
     * @param int $publicationYear
     */
    public function setPublicationYear(int $publicationYear): void
    {
        $this->publicationYear = $publicationYear;
    }

    /**
     * @return int
     */
    public function getStartPage(): ?int
    {
        return $this->startPage;
    }

    /**
     * @param int $startPage
     */
    public function setStartPage(int $startPage): void
    {
        $this->startPage = $startPage;
    }

    /**
     * @return int
     */
    public function getEndPage(): ?int
    {
        return $this->endPage;
    }

    /**
     * @param int $endPage
     */
    public function setEndPage(int $endPage): void
    {
        $this->endPage = $endPage;
    }
}
