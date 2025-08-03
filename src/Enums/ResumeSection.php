<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Enums;

enum ResumeSection: string
{
    case WORK = 'work';
    case VOLUNTEER = 'volunteer';
    case EDUCATION = 'education';
    case AWARDS = 'awards';
    case CERTIFICATES = 'certificates';
    case PUBLICATIONS = 'publications';
    case SKILLS = 'skills';
    case LANGUAGES = 'languages';
    case INTERESTS = 'interests';
    case REFERENCES = 'references';
    case PROJECTS = 'projects';

    public function getPropertyName(): string
    {
        return $this->value;
    }
}
