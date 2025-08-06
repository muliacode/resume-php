<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Models;

use JsonSerializable;
use Muliacode\Resumify\Traits\FilterNullValuesFromArray;

final class Interest implements JsonSerializable
{
    use FilterNullValuesFromArray;

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
     * @param string[]|null $keywords
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

    /**
     * @return array<string, mixed>
     */
    public function getJsonData(): array
    {
        return [
          'name' => $this->name,
          'keywords' => $this->keywords,
        ];
    }
}
