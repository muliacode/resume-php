<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

final class Skill
{
    public function __construct(
        private ?string $name = null,
        private ?string $level = null,
        /**
         * @var string[]|null
         */
        private ?array $keywords = []
    ) {
        if ($this->keywords === null) {
            $this->keywords = [];
        }
    }

    /**
     * @param string[]|null $keywords
     */
    public static function create(
        ?string $name = null,
        ?string $level = null,
        ?array $keywords = []
    ): self {
        return new self($name, $level, $keywords);
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

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): self
    {
        $this->level = $level;
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
