<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

use Muliacode\Resume\Enums\SkillLevel;
use JsonSerializable;

final class Skill implements JsonSerializable
{
    public function __construct(
        private ?string $name = null,
        private ?SkillLevel $level = null,
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
        ?SkillLevel $level = null,
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

    public function getLevel(): ?SkillLevel
    {
        return $this->level;
    }

    public function setLevel(?SkillLevel $level): self
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

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'level' => $this->level?->value,
            'keywords' => $this->keywords,
        ];
    }
}
