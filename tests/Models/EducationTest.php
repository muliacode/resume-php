<?php

declare(strict_types=1);

namespace Muliacode\Resume\Tests\Models;

use Muliacode\Resume\Enums\EducationType;
use Muliacode\Resume\Models\Education;

test('it can create an Education instance with all properties', function (): void {
    $education = Education::create(
        'Test University',
        'https://test-university.edu',
        'Computer Science',
        EducationType::Bachelor,
        '2020-01-01',
        '2024-01-01',
        '4.0',
        ['CS101', 'CS102']
    )->validate();

    expect($education->getInstitution())->toBe('Test University')
        ->and($education->getUrl())->toBe('https://test-university.edu')
        ->and($education->getArea())->toBe('Computer Science')
        ->and($education->getStudyType())->toBe(EducationType::Bachelor)
        ->and($education->getStartDate())->toBe('2020-01-01')
        ->and($education->getEndDate())->toBe('2024-01-01')
        ->and($education->getScore())->toBe('4.0')
        ->and($education->getCourses())->toBe(['CS101', 'CS102']);
});

test('it can create an Education instance with all properties using setters', function (): void {
    $education = Education::create()
        ->setInstitution('Test University')
        ->setUrl('https://test-university.edu')
        ->setArea('Computer Science')
        ->setStudyType(EducationType::Bachelor)
        ->setStartDate('2020-01-01')
        ->setEndDate('2024-01-01')
        ->setScore('4.0')
        ->setCourses(['CS101', 'CS102']);

    expect($education->getInstitution())->toBe('Test University')
        ->and($education->getUrl())->toBe('https://test-university.edu')
        ->and($education->getArea())->toBe('Computer Science')
        ->and($education->getStudyType())->toBe(EducationType::Bachelor)
        ->and($education->getStartDate())->toBe('2020-01-01')
        ->and($education->getEndDate())->toBe('2024-01-01')
        ->and($education->getScore())->toBe('4.0')
        ->and($education->getCourses())->toBe(['CS101', 'CS102']);
});

test('it can create an Education instance with null properties', function (): void {
    $education = Education::create();

    expect($education->getInstitution())->toBeNull()
        ->and($education->getUrl())->toBeNull()
        ->and($education->getArea())->toBeNull()
        ->and($education->getStudyType())->toBeNull()
        ->and($education->getStartDate())->toBeNull()
        ->and($education->getEndDate())->toBeNull()
        ->and($education->getScore())->toBeNull()
        ->and($education->getCourses())->toBe([]);
});
