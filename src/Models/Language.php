<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Models;

use Muliacode\Resumify\Enums\LanguageFluencyLevel;
use JsonSerializable;

final class Language implements JsonSerializable
{
    public function __construct(
        private ?string $language = null,
        private ?LanguageFluencyLevel $fluency = null,
    ) {
    }

    public static function create(?string $language = null, ?LanguageFluencyLevel $fluency = null): self
    {
        return new self($language, $fluency);
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getFluency(): ?LanguageFluencyLevel
    {
        return $this->fluency;
    }

    public function setFluency(?LanguageFluencyLevel $fluency): self
    {
        $this->fluency = $fluency;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'language' => $this->language,
            'fluency' => $this->fluency?->description(),
        ];
    }
}
