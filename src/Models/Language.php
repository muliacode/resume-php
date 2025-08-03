<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

final class Language
{
    public function __construct(
        private ?string $language = null,
        private ?string $fluency = null,
    ) {
    }

    public static function create(?string $language = null, ?string $fluency = null): self
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

    public function getFluency(): ?string
    {
        return $this->fluency;
    }

    public function setFluency(?string $fluency): self
    {
        $this->fluency = $fluency;
        return $this;
    }
}
