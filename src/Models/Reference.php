<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

final class Reference
{
    public function __construct(
        private ?string $name = null,
        private ?string $reference = null,
    ) {
    }

    public static function create(
        ?string $name = null,
        ?string $reference = null
    ): self {
        return new self($name, $reference);
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;
        return $this;
    }
}
