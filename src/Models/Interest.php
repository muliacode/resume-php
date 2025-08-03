<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

final class Interest
{
    public function __construct(
        private ?string $name = null,
        /**
         * @var string[]|null
         */
        private ?array $keywords = null,
    ) {
        if ($keywords === null) {
            $this->keywords = [];
        }
    }

    /**
     * @param string|null $name
     * @param string[]|null $keywords
     * @return self
     */
    public static function create(?string $name = null, ?array $keywords = null): self
    {
        return new self($name, $keywords);
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
}
