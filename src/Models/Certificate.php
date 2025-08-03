<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

final class Certificate
{
    public function __construct(
        private ?string $name = null,
        private ?string $date = null,
        private ?string $url = null,
        private ?string $issuer = null
    ) {
    }

    public static function create(
        ?string $name = null,
        ?string $date = null,
        ?string $url = null,
        ?string $issuer = null
    ): self {
        return new self($name, $date, $url, $issuer);
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

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;
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

    public function getIssuer(): ?string
    {
        return $this->issuer;
    }

    public function setIssuer(?string $issuer): self
    {
        $this->issuer = $issuer;
        return $this;
    }
}
