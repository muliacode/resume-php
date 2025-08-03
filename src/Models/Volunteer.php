<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

final class Volunteer
{
    public function __construct(
        private ?string $organization = null,
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
        // TODO: Validate dates and URLs.

        if ($this->highlights === null) {
            $this->highlights = [];
        }
    }

    /**
     * @param array<string>|null $highlights
     */
    public static function create(
        ?string $organization = null,
        ?string $position = null,
        ?string $url = null,
        ?string $startDate = null,
        ?string $endDate = null,
        ?string $summary = null,
        ?array $highlights = null
    ): self {
        return new self($organization, $position, $url, $startDate, $endDate, $summary, $highlights);
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(?string $organization): self
    {
        $this->organization = $organization;
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
