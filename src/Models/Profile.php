<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Models;

use Muliacode\Resumify\Enums\Network;
use Muliacode\Resumify\Traits\FilterNullValuesFromArray;
use Muliacode\Resumify\Traits\UrlValidationTrait;
use JsonSerializable;

final class Profile implements JsonSerializable
{
    use UrlValidationTrait;
    use FilterNullValuesFromArray;

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

    /**
     * @return array<string, mixed>
     */
    public function getJsonData(): array
    {
        return [
            'network' => $this->network->value,
            'username' => $this->username,
            'url' => $this->url,
        ];
    }
}
