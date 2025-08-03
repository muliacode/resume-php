<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

use Muliacode\Resume\Traits\DateValidationTrait;
use Muliacode\Resume\Traits\UrlValidationTrait;

final class Work
{
    use DateValidationTrait;
    use UrlValidationTrait;

    public function __construct(
        private ?string $name = null,
        private ?string $location = null,
        private ?string $description = null,
        private ?string $position = null,
        private ?string $url = null,
        private ?string $startDate = null,
        private ?string $endDate = null,
        private ?string $summary = null,
        /**
         * @var array<string>|null
         */
        private ?array $highlights = null,
    ) {
        if ($this->highlights === null) {
            $this->highlights = [];
        }
    }

    /**
     * @param array<string>|null $highlights
     */
    public static function create(
        ?string $name = null,
        ?string $location = null,
        ?string $description = null,
        ?string $position = null,
        ?string $url = null,
        ?string $startDate = null,
        ?string $endDate = null,
        ?string $summary = null,
        ?array $highlights = null
    ): self {
        return new self($name, $location, $description, $position, $url, $startDate, $endDate, $summary, $highlights);
    }

    public function validate(): self
    {
        $this->validateUrl($this->url);
        $this->validateDate($this->startDate);
        $this->validateDate($this->endDate);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(?string $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(?string $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getHighlights(): ?array
    {
        return $this->highlights;
    }

    /**
     * @param string[]|null $highlights
     * @return $this
     */
    public function setHighlights(?array $highlights): self
    {
        $this->highlights = $highlights;
        return $this;
    }
}
