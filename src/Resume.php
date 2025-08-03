<?php

declare(strict_types=1);

namespace Muliacode\Resume;

use Muliacode\Resume\Models\Award;
use Muliacode\Resume\Models\Basics;
use Muliacode\Resume\Models\Certificate;
use Muliacode\Resume\Models\Education;
use Muliacode\Resume\Models\Publication;
use Muliacode\Resume\Models\Skill;
use Muliacode\Resume\Models\Volunteer;
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

    /**
     * @var Volunteer[]
     */
    private array $volunteer = [];

    /**
     * @var Education[]
     */
    private array $education = [];

    /**
     * @var Award[]
     */
    private array $awards = [];

    /**
     * @var Certificate[]
     */
    private array $certificates = [];

    /**
     * @var Publication[]
     */
    private array $publications = [];

    /**
     * @var Skill[]
     */
    private array $skills = [];

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

    public function addVolunteer(Volunteer ...$volunteer): self
    {
        foreach ($volunteer as $item) {
            $this->volunteer[] = $item;
        }

        return $this;
    }

    /**
     * @return Volunteer[]
     */
    public function getVolunteer(): array
    {
        return $this->volunteer;
    }

    public function addEducation(Education ...$education): self
    {
        foreach ($education as $item) {
            $this->education[] = $item;
        }

        return $this;
    }

    /**
     * @return Education[]
     */
    public function getEducation(): array
    {
        return $this->education;
    }

    public function addAwards(Award ...$awards): self
    {
        foreach ($awards as $item) {
            $this->awards[] = $item;
        }

        return $this;
    }

    /**
     * @return Award[]
     */
    public function getAwards(): array
    {
        return $this->awards;
    }

    public function addCertificates(Certificate ...$certificates): self
    {
        foreach ($certificates as $item) {
            $this->certificates[] = $item;
        }

        return $this;
    }

    /**
     * @return Certificate[]
     */
    public function getCertificates(): array
    {
        return $this->certificates;
    }

    public function addPublications(Publication ...$publications): self
    {
        foreach ($publications as $item) {
            $this->publications[] = $item;
        }

        return $this;
    }

    /**
     * @return Publication[]
     */
    public function getPublications(): array
    {
        return $this->publications;
    }

    public function addSkills(Skill ...$skills): self
    {
        foreach ($skills as $item) {
            $this->skills[] = $item;
        }

        return $this;
    }

    /**
     * @return Skill[]
     */
    public function getSkills(): array
    {
        return $this->skills;
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
