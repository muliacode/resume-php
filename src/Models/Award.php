<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Models;

use Muliacode\Resumify\Traits\DateValidationTrait;
use JsonSerializable;

final class Award implements JsonSerializable
{
    use DateValidationTrait;

    public function __construct(
        private ?string $title = null,
        private ?string $date = null,
        private ?string $awarder = null,
        private ?string $summary = null,
    ) {
    }

    public static function create(
        ?string $title = null,
        ?string $date = null,
        ?string $awarder = null,
        ?string $summary = null
    ): self {
        return new self($title, $date, $awarder, $summary);
    }

    public function validate(): self
    {
        $this->validateDate($this->date);

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getAwarder(): ?string
    {
        return $this->awarder;
    }

    public function setAwarder(?string $awarder): self
    {
        $this->awarder = $awarder;
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
          'title' => $this->title,
          'date' => $this->date,
          'awarder' => $this->awarder,
          'summary' => $this->summary,
        ];
    }
}
