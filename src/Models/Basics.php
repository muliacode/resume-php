<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Models;

use Muliacode\Resumify\Traits\EmailValidationTrait;
use Muliacode\Resumify\Traits\FilterNullValuesFromArray;
use Muliacode\Resumify\Traits\PhoneNumberValidationTrait;
use Muliacode\Resumify\Traits\UrlValidationTrait;
use JsonSerializable;

final class Basics implements JsonSerializable
{
    use EmailValidationTrait;
    use PhoneNumberValidationTrait;
    use UrlValidationTrait;
    use FilterNullValuesFromArray;

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
     * @param Location|null $location The location.
     * @param Profile[]|null $profiles The profiles.
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
        private ?Location $location = null,
        private ?array $profiles = [],
    ) {

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
     * @param Location|null $location A location of the instance
     * @param Profile[]|null $profiles A list of profiles of the instance.
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
        ?Location $location = null,
        ?array $profiles = [],
    ): self {
        return new self($name, $label, $image, $email, $phone, $url, $summary, $location, $profiles);
    }

    public function validate(): self
    {
        $this->validateEmail($this->email);
        $this->validatePhoneNumber($this->phone);
        $this->validateUrl($this->url);

        $this->location?->validate();

        if ($this->profiles !== null) {
            foreach ($this->profiles as $profile) {
                $profile->validate();
            }
        }

        return $this;
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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Profile[]|null
     */
    public function getProfiles(): ?array
    {
        return $this->profiles;
    }

    /**
     * @param Profile[]|null $profiles
     * @return $this
     */
    public function setProfiles(?array $profiles): self
    {
        $this->profiles = $profiles;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getJsonData(): array
    {
        return [
            'name' => $this->name,
            'label' => $this->label,
            'image' => $this->image,
            'email' => $this->email,
            'phone' => $this->phone,
            'url' => $this->url,
            'summary' => $this->summary,
            'location' => $this->location?->jsonSerialize(),
            'profiles' => array_map(fn (Profile $profile): array => $profile->jsonSerialize(), $this->profiles),
        ];
    }
}
