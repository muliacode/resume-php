<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

use Muliacode\Resume\Enums\LanguageFluencyLevel;

final class Language
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
}
