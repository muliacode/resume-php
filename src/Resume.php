<?php

declare(strict_types=1);

namespace Muliacode\Resume;

use Muliacode\Resume\Models\Award;
use Muliacode\Resume\Models\Basics;
use Muliacode\Resume\Models\Certificate;
use Muliacode\Resume\Models\Education;
use Muliacode\Resume\Models\Interest;
use Muliacode\Resume\Models\Language;
use Muliacode\Resume\Models\Project;
use Muliacode\Resume\Models\Publication;
use Muliacode\Resume\Models\Reference;
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

    /**
     * @var Language[]
     */
    private array $languages = [];

    /**
     * @var Interest[]
     */
    private array $interests = [];

    /**
     * @var Reference[]
     */
    private array $references = [];

    /**
     * @var Project[]
     */
    private array $projects = [];

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

    public function addLanguages(Language ...$languages): self
    {
        foreach ($languages as $item) {
            $this->languages[] = $item;
        }

        return $this;
    }

    /**
     * @return Language[]
     */
    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function addInterests(Interest ...$interests): self
    {
        foreach ($interests as $item) {
            $this->interests[] = $item;
        }

        return $this;
    }

    /**
     * @return Interest[]
     */
    public function getInterests(): array
    {
        return $this->interests;
    }

    public function addReferences(Reference ...$references): self
    {
        foreach ($references as $item) {
            $this->references[] = $item;
        }

        return $this;
    }

    /**
     * @return Reference[]
     */
    public function getReferences(): array
    {
        return $this->references;
    }

    public function addProjects(Project ...$projects): self
    {
        foreach ($projects as $item) {
            $this->projects[] = $item;
        }

        return $this;
    }

    /**
     * @return Project[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }

    /**
     * Marks the completion of an operation and returns the current instance.
     *
     * @return self The current instance.
     */
    public function done(): self
    {
        $this->validate();

        return $this;
    }

    public function validate(): self
    {
        $this->basics->validate();

        foreach ($this->work as $item) {
            $item->validate();
        }

        foreach ($this->volunteer as $item) {
            $item->validate();
        }

        foreach ($this->education as $item) {
            $item->validate();
        }

        foreach ($this->awards as $item) {
            $item->validate();
        }

        foreach ($this->certificates as $item) {
            $item->validate();
        }

        foreach ($this->publications as $item) {
            $item->validate();
        }

        foreach ($this->projects as $item) {
            $item->validate();
        }

        return $this;
    }
}
