<?php

declare(strict_types=1);

namespace Muliacode\Resume;

use Muliacode\Resume\Models\Basics;
use Muliacode\Resume\Models\Work;

/**
 * Resume Facade
 *
 * This is the main entry point for the Resume library.
 * It provides a simplified interface to create and manage resume data
 * using the JSON-resume standard format.
 *
 */
final class Resume
{
    private Basics $basics;
    /**
     * @var Work[]
     */
    private array $work = [];

    public function __construct()
    {
        $this->basics = Basics::create();
    }

    /**
     * Creates and returns a new instance of the class.
     *
     * @return self A new instance of the class.
     */
    public static function create(): self
    {
        return new self();
    }

    public function basics(?Basics $value = null): Basics
    {
        if (!$value instanceof Basics) {
            return $this->basics;
        }

        $this->basics = $value;
        return $this->basics;
    }

    public function addWork(Work ...$work): self
    {
        foreach ($work as $item) {
            $this->work[] = $item;
        }

        return $this;
    }

    /**
     * @return Work[]
     */
    public function getWork(): array
    {
        return $this->work;
    }

    /**
     * Marks the completion of an operation and returns the current instance.
     *
     * @return self The current instance.
     */
    public function done(): self
    {
        return $this;
    }

    /**
     * Converts the object to an associative array representation.
     *
     * @return array<string, mixed> The associative array representation of the object.
     */
    public function toArray(): array
    {
        return [
            'basics' => $this->basics->toArray(),
        ];
    }

    /**
     * Converts the object to its JSON string representation.
     *
     * @return string The JSON string representation of the object.
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
