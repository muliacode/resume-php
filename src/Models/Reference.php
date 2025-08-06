<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Models;

use JsonSerializable;
use Muliacode\Resumify\Traits\FilterNullValuesFromArray;

final class Reference implements JsonSerializable
{
    use FilterNullValuesFromArray;

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

    /**
     * @return array<string, mixed>
     */
    public function getJsonData(): array
    {
        return [
            'name' => $this->name,
            'reference' => $this->reference,
        ];
    }
}
