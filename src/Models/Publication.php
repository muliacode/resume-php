<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

use Muliacode\Resume\Traits\DateValidationTrait;
use Muliacode\Resume\Traits\UrlValidationTrait;
use JsonSerializable;

final class Publication implements JsonSerializable
{
    use DateValidationTrait;
    use UrlValidationTrait;

    public function __construct(
        private ?string $name = null,
        private ?string $publisher = null,
        private ?string $releaseDate = null,
        private ?string $url = null,
        private ?string $summary = null,
    ) {
    }

    public static function create(
        ?string $name = null,
        ?string $publisher = null,
        ?string $releaseDate = null,
        ?string $url = null,
        ?string $summary = null
    ): self {
        return new self($name, $publisher, $releaseDate, $url, $summary);
    }

    public function validate(): self
    {
        $this->validateDate($this->releaseDate);
        $this->validateUrl($this->url);

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

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(?string $publisher): self
    {
        $this->publisher = $publisher;
        return $this;
    }

    public function getReleaseDate(): ?string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?string $releaseDate): self
    {
        $this->releaseDate = $releaseDate;
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
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'publisher' => $this->publisher,
            'releaseDate' => $this->releaseDate,
            'url' => $this->url,
            'summary' => $this->summary,
        ];
    }
}
