<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

use Muliacode\Resume\Traits\DateValidationTrait;
use Muliacode\Resume\Traits\UrlValidationTrait;

final class Project
{
    use DateValidationTrait;
    use UrlValidationTrait;

    public function __construct(
        private ?string $name = null,
        private ?string $description = null,
        /**
         * @var string[]|null
         */
        private ?array $highlights = null,

        /**
         * @var string[]|null
         */
        private ?array $keywords = null,
        private ?string $startDate = null,
        private ?string $endDate = null,
        private ?string $url = null,
        /**
         * @var string[]|null
         */
        private ?array $roles = null,
        private ?string $entity = null,
        private ?string $type = null
    ) {
        if ($highlights === null) {
            $this->highlights = [];
        }

        if ($keywords === null) {
            $this->keywords = [];
        }

        if ($roles === null) {
            $this->roles = [];
        }
    }

    /**
     * @param string[]|null $highlights
     * @param string[]|null $keywords
     * @param string[]|null $roles
     */
    public static function create(
        ?string $name = null,
        ?string $description = null,
        ?array $highlights = null,
        ?array $keywords = null,
        ?string $startDate = null,
        ?string $endDate = null,
        ?string $url = null,
        ?array $roles = null,
        ?string $entity = null,
        ?string $type = null
    ): self {
        return new self($name, $description, $highlights, $keywords, $startDate, $endDate, $url, $roles, $entity, $type);
    }

    public function validate(): self
    {
        $this->validateUrl($this->url);
        $this->validateDate($this->startDate);
        $this->validateDate($this->endDate);

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getHighlights(): ?array
    {
        return $this->highlights;
    }

    /**
     * @param string[]|null $highlights
     * @return $this
     */
    public function setHighlights(?array $highlights): self
    {
        $this->highlights = $highlights;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getKeywords(): ?array
    {
        return $this->keywords;
    }

    /**
     * @param string[]|null $keywords
     * @return $this
     */
    public function setKeywords(?array $keywords): self
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(?string $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(?string $endDate): self
    {
        $this->endDate = $endDate;
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

    /**
     * @return string[]|null
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param string[]|null $roles
     * @return $this
     */
    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getEntity(): ?string
    {
        return $this->entity;
    }

    public function setEntity(?string $entity): self
    {
        $this->entity = $entity;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }
}
