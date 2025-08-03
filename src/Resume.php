<?php

declare(strict_types=1);

namespace Muliacode\Resumify;

use Muliacode\Resumify\Enums\ResumeSection;
use Muliacode\Resumify\Models\Award;
use Muliacode\Resumify\Models\Basics;
use Muliacode\Resumify\Models\Certificate;
use Muliacode\Resumify\Models\Education;
use Muliacode\Resumify\Models\Interest;
use Muliacode\Resumify\Models\Language;
use Muliacode\Resumify\Models\Project;
use Muliacode\Resumify\Models\Publication;
use Muliacode\Resumify\Models\Reference;
use Muliacode\Resumify\Models\Skill;
use Muliacode\Resumify\Models\Volunteer;
use Muliacode\Resumify\Models\Work;
use JsonSerializable;

/**
 * Resume Facade
 *
 * This is the main entry point for the Resume library.
 * It provides a simplified interface to create and manage resume data
 * using the JSON-resume standard format.
 *
 */
final class Resume implements JsonSerializable
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

    /**
     * @return array<string, mixed>
     */
    public function summarize(): array
    {
        return [
            'name' => $this->basics->getName(),
            'email' => $this->basics->getEmail(),
            'work_experiences' => count($this->work),
            'education_entries' => count($this->education),
            'skills' => count($this->skills),
            'projects' => count($this->projects),
            'languages' => count($this->languages),
            'certificates' => count($this->certificates),
            'awards' => count($this->awards),
            'has_awards' => $this->awards !== [],
            'publications' => count($this->publications),
            'has_publications' => $this->publications !== [],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [
            'basics' => $this->basics->jsonSerialize(),
        ];

        foreach (ResumeSection::cases() as $section) {
            $propertyName = $section->getPropertyName();
            $sectionItems = $this->{$propertyName};

            if (!empty($sectionItems)) {
                $data[$propertyName] = $this->serializeItems($sectionItems);
            }
        }

        return $data;
    }

    /**
     * @param array<mixed> $items
     * @return array<mixed>
     */
    private function serializeItems(array $items): array
    {
        return array_map(
            static fn ($item) => $item->jsonSerialize(),
            $items
        );
    }
}
