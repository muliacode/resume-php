<?php

declare(strict_types=1);

namespace Muliacode\Resume\Tests\Enums;

use Muliacode\Resume\Enums\ResumeSection;

test('it returns the correct property name for WORK', function (): void {
    expect(ResumeSection::WORK->getPropertyName())->toBe('work');
});

test('it returns the correct property name for VOLUNTEER', function (): void {
    expect(ResumeSection::VOLUNTEER->getPropertyName())->toBe('volunteer');
});

test('it returns the correct property name for EDUCATION', function (): void {
    expect(ResumeSection::EDUCATION->getPropertyName())->toBe('education');
});

test('it returns the correct property name for AWARDS', function (): void {
    expect(ResumeSection::AWARDS->getPropertyName())->toBe('awards');
});

test('it returns the correct property name for CERTIFICATES', function (): void {
    expect(ResumeSection::CERTIFICATES->getPropertyName())->toBe('certificates');
});

test('it returns the correct property name for PUBLICATIONS', function (): void {
    expect(ResumeSection::PUBLICATIONS->getPropertyName())->toBe('publications');
});

test('it returns the correct property name for SKILLS', function (): void {
    expect(ResumeSection::SKILLS->getPropertyName())->toBe('skills');
});

test('it returns the correct property name for LANGUAGES', function (): void {
    expect(ResumeSection::LANGUAGES->getPropertyName())->toBe('languages');
});

test('it returns the correct property name for INTERESTS', function (): void {
    expect(ResumeSection::INTERESTS->getPropertyName())->toBe('interests');
});

test('it returns the correct property name for REFERENCES', function (): void {
    expect(ResumeSection::REFERENCES->getPropertyName())->toBe('references');
});

test('it returns the correct property name for PROJECTS', function (): void {
    expect(ResumeSection::PROJECTS->getPropertyName())->toBe('projects');
});
