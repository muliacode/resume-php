<?php

declare(strict_types=1);

namespace Muliacode\Resume\Models;

use Muliacode\Resume\Enums\EducationType;
use Muliacode\Resume\Traits\DateValidationTrait;
use Muliacode\Resume\Traits\UrlValidationTrait;

final class Education
{
    use DateValidationTrait;
    use UrlValidationTrait;

    public function __construct(
        private ?string $institution = null,
        private ?string $url = null,
        private ?string $area = null,
        private ?EducationType $studyType = null,
        private ?string $startDate = null,
        private ?string $endDate = null,
        private ?float $score = null,
        /**
         * @var string[]|null
         */
        private ?array $courses = null,
    ) {
        if ($this->courses === null) {
            $this->courses = [];
        }
    }

    /**
     * @param string[]|null $courses
     */
    public static function create(
        ?string $institution = null,
        ?string $url = null,
        ?string $area = null,
        ?EducationType $studyType = null,
        ?string $startDate = null,
        ?string $endDate = null,
        ?float $score = null,
        ?array $courses = null
    ): self {
        return new self($institution, $url, $area, $studyType, $startDate, $endDate, $score, $courses);
    }

    public function validate(): self
    {
        $this->validateUrl($this->url);
        $this->validateDate($this->startDate);
        $this->validateDate($this->endDate);

        return $this;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function setInstitution(?string $institution): self
    {
        $this->institution = $institution;
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

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(?string $area): self
    {
        $this->area = $area;
        return $this;
    }

    public function getStudyType(): ?EducationType
    {
        return $this->studyType;
    }

    public function setStudyType(?EducationType $studyType): self
    {
        $this->studyType = $studyType;
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

    public function getScore(int $precision = 2): ?float
    {
        if ($this->score === null) {
            return null;
        }

        return round($this->score, $precision);
    }

    public function setScore(?float $score): self
    {
        $this->score = $score;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getCourses(): ?array
    {
        return $this->courses;
    }

    /**
     * @param string[]|null $courses
     * @return $this
     */
    public function setCourses(?array $courses): self
    {
        $this->courses = $courses;
        return $this;
    }
}
