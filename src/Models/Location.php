<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

final class Location
{
    public function __construct(
        private ?string $address = null,
        private ?string $postalCode = null,
        private ?string $city = null,
        private ?string $countryCode = null,
        private ?string $region = null
    ) {
        // TODO: Validate Country Code to be as per ISO-3166-1 ALPHA-2
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

    /**
     * Converts the properties of the current object to an associative array.
     *
     * @return array<string, mixed> An associative array containing the object's properties as keys and their values.
     */
    public function toArray(): array
    {
        return get_object_vars($this);
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
}
