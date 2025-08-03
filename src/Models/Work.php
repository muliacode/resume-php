<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

final class Work
{
    public function __construct(
        public ?string $name = null,
        public ?string $location = null,
        public ?string $description = null,
        public ?string $position = null,
        public ?string $url = null,
        public ?string $startDate = null,
        public ?string $endDate = null,
        public ?string $summary = null,
        /**
         * @var array<string>|null
         */
        public ?array $highlights = null,
    ) {
        // TODO: Validate dates and URLs.
    }

    /**
     * @param string|null $name
     * @param string|null $location
     * @param string|null $description
     * @param string|null $position
     * @param string|null $url
     * @param string|null $startDate
     * @param string|null $endDate
     * @param string|null $summary
     * @param array<string>|null $highlights
     * @return self
     */
    public static function create(
        ?string $name = null,
        ?string $location = null,
        ?string $description = null,
        ?string $position = null,
        ?string $url = null,
        ?string $startDate = null,
        ?string $endDate = null,
        ?string $summary = null,
        ?array $highlights = null
    ): self {
        return new self($name, $location, $description, $position, $url, $startDate, $endDate, $summary, $highlights);
    }
}
