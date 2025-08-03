<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

use Muliacode\Resume\Traits\CountryCodeValidationTrait;
use Muliacode\Resume\Traits\PostalCodeValidationTrait;
use JsonSerializable;

final class Location implements JsonSerializable
{
    use CountryCodeValidationTrait;
    use PostalCodeValidationTrait;
    public function __construct(
        private ?string $address = null,
        private ?string $postalCode = null,
        private ?string $city = null,
        private ?string $countryCode = null,
        private ?string $region = null
    ) {

    }

    public static function create(
        ?string $address = null,
        ?string $postalCode = null,
        ?string $city = null,
        ?string $countryCode = null,
        ?string $region = null
    ): self {
        return new self($address, $postalCode, $city, $countryCode, $region);
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;
        return $this;
    }

    public function validate(): self
    {
        $this->validateCountryCode($this->countryCode);
        $this->validatePostalCode($this->postalCode, $this->countryCode);

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
          'address' => $this->address,
          'postalCode' => $this->postalCode,
          'city' => $this->city,
          'countryCode' => $this->countryCode,
          'region' => $this->region,
        ];
    }
}
