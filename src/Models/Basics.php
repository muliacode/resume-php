<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

final class Basics
{
    /**
     * Initializes a new instance of the class with the provided properties.
     *
     * @param string|null $name The name value.
     * @param string|null $label The label value.
     * @param string|null $image The image URL.
     * @param string|null $email The email address.
     * @param string|null $phone The phone number.
     * @param string|null $url The website URL.
     * @param string|null $summary A summary or description.
     *
     * @return void
     */
    public function __construct(
        private ?string $name = null,
        private ?string $label = null,
        private ?string $image = null,
        private ?string $email = null,
        private ?string $phone = null,
        private ?string $url = null,
        private ?string $summary = null,
    ) {
        // TODO: Add Validation such as email and phonenumber.
    }

    /**
     * Creates a new instance of the class with the provided parameters.
     *
     * @param string|null $name The name of the instance.
     * @param string|null $label A label associated with the instance.
     * @param string|null $image A URL or path to an image related to the instance.
     * @param string|null $email An email address associated with the instance.
     * @param string|null $phone A phone number associated with the instance.
     * @param string|null $url A URL associated with the instance.
     * @param string|null $summary A summary or description of the instance.
     *
     * @return self Returns a new instance of the class.
     */
    public static function create(
        ?string $name = null,
        ?string $label = null,
        ?string $image = null,
        ?string $email = null,
        ?string $phone = null,
        ?string $url = null,
        ?string $summary = null,
    ): self {
        return new self($name, $label, $image, $email, $phone, $url, $summary);
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;
        return $this;
    }
}
