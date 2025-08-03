<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

use Muliacode\Resume\Enums\Network;
use Muliacode\Resume\Traits\UrlValidationTrait;

final class Profile
{
    use UrlValidationTrait;
    public function __construct(
        private readonly Network $network,
        private readonly string $username,
        private ?string $url = null,
    ) {
    }

    public static function create(
        Network $network,
        string $username,
        ?string $url = null
    ): self {
        return new self($network, $username, $url);
    }

    public function validate(): self
    {
        $this->validateUrl($this->url);

        return $this;
    }

    public function getNetwork(): Network
    {
        return $this->network;
    }

    public function getUsername(): string
    {
        return $this->username;
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
}
