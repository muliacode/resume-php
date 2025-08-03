<?php

declare(strict_types=1);

use Muliacode\Resume\Models\Award;
use Muliacode\Resume\Models\Basics;
use Muliacode\Resume\Models\Certificate;
use Muliacode\Resume\Models\Education;
use Muliacode\Resume\Models\Language;
use Muliacode\Resume\Models\Publication;
use Muliacode\Resume\Models\Skill;
use Muliacode\Resume\Models\Volunteer;
use Muliacode\Resume\Models\Work;
use Muliacode\Resume\Resume;

beforeEach(function (): void {
    $this->resume = Resume::create();
});

it('can be instantiated', function (): void {
    expect($this->resume)->toBeInstanceOf(Resume::class);
});

it('can be created with the create method', function (): void {
    $resume = Resume::create();
    expect($resume)->toBeInstanceOf(Resume::class);
});

it('has default personal information', function (): void {
    expect($this->resume->basics())->toBeInstanceOf(Basics::class);
});

it('can set personal information via property', function (): void {
    $newPersonalInfo = Basics::create(name: 'Jane Doe');
    $this->resume->basics($newPersonalInfo);

    expect($this->resume->basics())->toBe($newPersonalInfo)
        ->and($this->resume->basics()->getName())->toBe('Jane Doe');
});
it('can add a single volunteer experience', function (): void {
    $volunteer = new Volunteer(
        organization: 'Volunteer Org A',
        position: 'Community Helper',
        url: 'https://volunteerorga.com',
        startDate: '2023-01-01',
        endDate: '2024-01-01',
        summary: 'Assisted in community services',
        highlights: ['Organized events', 'Improved outreach efforts']
    );

    $this->resume->addVolunteer($volunteer);

    expect($this->resume->getVolunteer())->toHaveCount(1)
        ->and($this->resume->getVolunteer()[0])->toBe($volunteer);
});

it('can add multiple volunteer experiences', function (): void {
    $volunteer1 = new Volunteer(
        organization: 'Volunteer Org A',
        position: 'Community Helper',
        url: 'https://volunteerorga.com',
        startDate: '2023-01-01',
        endDate: '2024-01-01',
        summary: 'Assisted in community services',
        highlights: ['Organized events', 'Improved outreach efforts']
    );

    $volunteer2 = new Volunteer(
        organization: 'Volunteer Org B',
        position: 'Event Coordinator',
        url: 'https://volunteerorgb.com',
        startDate: '2024-02-01',
        endDate: '2025-02-01',
        summary: 'Coordinated team events',
        highlights: ['Planned successful campaigns', 'Improved teamwork']
    );

    $this->resume->addVolunteer($volunteer1, $volunteer2);

    expect($this->resume->getVolunteer())->toHaveCount(2)
        ->and($this->resume->getVolunteer())->toContain($volunteer1, $volunteer2);
});

it('returns itself after adding volunteer experience', function (): void {
    $volunteer = new Volunteer(
        organization: 'Volunteer Org A',
        position: 'Community Helper',
        url: 'https://volunteerorga.com',
        startDate: '2023-01-01',
        endDate: '2024-01-01',
        summary: 'Assisted in community services',
        highlights: ['Organized events', 'Improved outreach efforts']
    );

    $result = $this->resume->addVolunteer($volunteer);

    expect($result)->toBe($this->resume);
});

it('can retrieve added volunteer experiences', function (): void {
    $volunteer = new Volunteer(
        organization: 'Volunteer Org A',
        position: 'Community Helper',
        url: 'https://volunteerorga.com',
        startDate: '2023-01-01',
        endDate: '2024-01-01',
        summary: 'Assisted in community services',
        highlights: ['Organized events', 'Improved outreach efforts']
    );

    $this->resume->addVolunteer($volunteer);

    $retrievedVolunteers = $this->resume->getVolunteer();

    expect($retrievedVolunteers)->toBeArray()
        ->and($retrievedVolunteers[0])->toBe($volunteer);
});
it('returns itself from done method', function (): void {
    $result = $this->resume->done();
    expect($result)->toBe($this->resume);
});

it('can add a single certificate', function (): void {
    $certificate = new Certificate(
        name: 'Certified PHP Developer',
        date: '2023-06-01',
        url: 'https://certification.com/certificate/123',
        issuer: 'PHP Certification Authority'
    );

    $this->resume->addCertificates($certificate);

    expect($this->resume->getCertificates())->toHaveCount(1)
        ->and($this->resume->getCertificates()[0])->toBe($certificate);
});

it('can add multiple certificates', function (): void {
    $certificate1 = new Certificate(
        name: 'Certified PHP Developer',
        date: '2023-06-01',
        url: 'https://certification.com/certificate/123',
        issuer: 'PHP Certification Authority'
    );

    $certificate2 = new Certificate(
        name: 'Certified JavaScript Developer',
        date: '2024-05-15',
        url: 'https://certification.com/certificate/456',
        issuer: 'JS Certification Board'
    );

    $this->resume->addCertificates($certificate1, $certificate2);

    expect($this->resume->getCertificates())->toHaveCount(2)
        ->and($this->resume->getCertificates())->toContain($certificate1, $certificate2);
});

it('returns itself after adding certificates', function (): void {
    $certificate = new Certificate(
        name: 'Certified PHP Developer',
        date: '2023-06-01',
        url: 'https://certification.com/certificate/123',
        issuer: 'PHP Certification Authority'
    );

    $result = $this->resume->addCertificates($certificate);

    expect($result)->toBe($this->resume);
});

it('can add a single education entry', function (): void {
    $education = Education::create(
        institution: 'University A',
        url: 'https://universitya.com',
        area: 'Computer Science',
        studyType: 'Bachelor',
        startDate: '2015-01-01',
        endDate: '2019-01-01',
        score: '4.0',
        courses: ['Algorithms', 'Data Structures']
    );

    $this->resume->addEducation($education);

    expect($this->resume->getEducation())->toHaveCount(1)
        ->and($this->resume->getEducation()[0])->toBe($education);
});

it('can add multiple education entries', function (): void {
    $education1 = Education::create(
        institution: 'University A',
        url: 'https://universitya.com',
        area: 'Computer Science',
        studyType: 'Bachelor',
        startDate: '2015-01-01',
        endDate: '2019-01-01',
        score: '4.0',
        courses: ['Algorithms', 'Data Structures']
    );

    $education2 = Education::create(
        institution: 'University B',
        url: 'https://universityb.com',
        area: 'Software Engineering',
        studyType: 'Master',
        startDate: '2020-01-01',
        endDate: '2022-01-01',
        score: '4.0',
        courses: ['Machine Learning', 'Distributed Systems']
    );

    $this->resume->addEducation($education1, $education2);

    expect($this->resume->getEducation())->toHaveCount(2)
        ->and($this->resume->getEducation())->toContain($education1, $education2);
});

it('returns itself after adding education entries', function (): void {
    $education = Education::create(
        institution: 'University A',
        url: 'https://universitya.com',
        area: 'Computer Science',
        studyType: 'Bachelor',
        startDate: '2015-01-01',
        endDate: '2019-01-01',
        score: '4.0',
        courses: ['Algorithms', 'Data Structures']
    );

    $result = $this->resume->addEducation($education);

    expect($result)->toBe($this->resume);
});

it('can add a single work experience', function (): void {
    $work = new Work(
        name: 'Company A',
        location: 'New York',
        description: 'Developed software solutions',
        position: 'Software Engineer',
        url: 'https://companya.com',
        startDate: '2020-01-01',
        endDate: '2022-01-01',
        summary: 'Worked on various projects',
        highlights: ['Created new features', 'Improved performance']
    );

    $this->resume->addWork($work);

    expect($this->resume->getWork())->toHaveCount(1)
        ->and($this->resume->getWork()[0])->toBe($work);
});

it('can add multiple work experiences', function (): void {
    $work1 = new Work(
        name: 'Company A',
        location: 'New York',
        description: 'Developed software solutions',
        position: 'Software Engineer',
        url: 'https://companya.com',
        startDate: '2020-01-01',
        endDate: '2022-01-01',
        summary: 'Worked on various projects',
        highlights: ['Created new features', 'Improved performance']
    );

    $work2 = new Work(
        name: 'Company B',
        location: 'San Francisco',
        description: 'Led project teams',
        position: 'Project Manager',
        url: 'https://companyb.com',
        startDate: '2022-02-01',
        endDate: '2025-01-01',
        summary: 'Successfully delivered multiple projects',
        highlights: ['Achieved tight deadlines', 'Managed budgets']
    );

    $this->resume->addWork($work1, $work2);

    expect($this->resume->getWork())->toHaveCount(2)
        ->and($this->resume->getWork())->toContain($work1, $work2);
});

it('returns itself after adding work experience', function (): void {
    $work = new Work(
        name: 'Company A',
        location: 'New York',
        description: 'Developed software solutions',
        position: 'Software Engineer',
        url: 'https://companya.com',
        startDate: '2020-01-01',
        endDate: '2022-01-01',
        summary: 'Worked on various projects',
        highlights: ['Created new features', 'Improved performance']
    );

    $result = $this->resume->addWork($work);

    expect($result)->toBe($this->resume);
});

it('can convert to array', function (): void {
    $array = $this->resume->toArray();

    expect($array)->toBeArray()
        ->and($array)->toHaveKey('basics')
        ->and($array['basics'])->toBeArray();
});

it('can convert to JSON string', function (): void {
    $json = $this->resume->toJson();
    $array = json_decode((string)$json, true);

    expect($json)->toBeString()
        ->and($array)->toBeArray()
        ->and($array)->toHaveKey('basics');
});

it('can add a single publication', function (): void {
    $publication = new Publication(
        name: 'The PHP Journal',
        publisher: 'Tech Publishing House',
        releaseDate: '2023-07-15',
        url: 'https://publication.com/php-journal',
        summary: 'A deep dive into PHP 8.4 features'
    );

    $this->resume->addPublications($publication);

    expect($this->resume->getPublications())->toHaveCount(1)
        ->and($this->resume->getPublications()[0])->toBe($publication);
});

it('can add multiple publications', function (): void {
    $publication1 = new Publication(
        name: 'The PHP Journal',
        publisher: 'Tech Publishing House',
        releaseDate: '2023-07-15',
        url: 'https://publication.com/php-journal',
        summary: 'A deep dive into PHP 8.4 features'
    );

    $publication2 = new Publication(
        name: 'The Java Journal',
        publisher: 'Code Insights',
        releaseDate: '2024-02-01',
        url: 'https://publication.com/java-journal',
        summary: 'Exploring Java performance optimization tricks'
    );

    $this->resume->addPublications($publication1, $publication2);

    expect($this->resume->getPublications())->toHaveCount(2)
        ->and($this->resume->getPublications())->toContain($publication1, $publication2);
});

it('returns itself after adding publications', function (): void {
    $publication = new Publication(
        name: 'The PHP Journal',
        publisher: 'Tech Publishing House',
        releaseDate: '2023-07-15',
        url: 'https://publication.com/php-journal',
        summary: 'A deep dive into PHP 8.4 features'
    );

    $result = $this->resume->addPublications($publication);

    expect($result)->toBe($this->resume);
});

it('can add a single award', function (): void {
    $award = new Award(
        title: 'Best Developer',
        date: '2023-05-01',
        awarder: 'Tech World',
        summary: 'Awarded for exceptional software development skills'
    );

    $this->resume->addAwards($award);

    expect($this->resume->getAwards())->toHaveCount(1)
        ->and($this->resume->getAwards()[0])->toBe($award);
});

it('can add multiple awards', function (): void {
    $award1 = new Award(
        title: 'Best Developer',
        date: '2023-05-01',
        awarder: 'Tech World',
        summary: 'Awarded for exceptional software development skills'
    );

    $award2 = new Award(
        title: 'Innovation Award',
        date: '2024-08-01',
        awarder: 'Software Pioneers',
        summary: 'Awarded for innovative software solutions'
    );

    $this->resume->addAwards($award1, $award2);

    expect($this->resume->getAwards())->toHaveCount(2)
        ->and($this->resume->getAwards())->toContain($award1, $award2);
});

it('returns itself after adding awards', function (): void {
    $award = new Award(
        title: 'Best Developer',
        date: '2023-05-01',
        awarder: 'Tech World',
        summary: 'Awarded for exceptional software development skills'
    );

    $result = $this->resume->addAwards($award);

    expect($result)->toBe($this->resume);
});

it('can retrieve added awards', function (): void {
    $award = new Award(
        title: 'Best Developer',
        date: '2023-05-01',
        awarder: 'Tech World',
        summary: 'Awarded for exceptional software development skills'
    );

    $this->resume->addAwards($award);

    $retrievedAwards = $this->resume->getAwards();

    expect($retrievedAwards)->toBeArray()
        ->and($retrievedAwards[0])->toBe($award);
});

it('can add a single skill', function (): void {
    $skill = new Skill(
        name: 'PHP',
        level: 'Expert',
        keywords: ['OOP', 'Laravel', 'Testing']
    );

    $this->resume->addSkills($skill);

    expect($this->resume->getSkills())->toHaveCount(1)
        ->and($this->resume->getSkills()[0])->toBe($skill);
});

it('can add multiple skills', function (): void {
    $skill1 = new Skill(
        name: 'PHP',
        level: 'Expert',
        keywords: ['OOP', 'Laravel', 'Testing']
    );

    $skill2 = new Skill(
        name: 'JavaScript',
        level: 'Intermediate',
        keywords: ['React', 'Vue', 'Node']
    );

    $this->resume->addSkills($skill1, $skill2);

    expect($this->resume->getSkills())->toHaveCount(2)
        ->and($this->resume->getSkills())->toContain($skill1, $skill2);
});

it('returns itself after adding skills', function (): void {
    $skill = new Skill(
        name: 'PHP',
        level: 'Expert',
        keywords: ['OOP', 'Laravel', 'Testing']
    );

    $result = $this->resume->addSkills($skill);

    expect($result)->toBe($this->resume);
});

it('can retrieve added skills', function (): void {
    $skill = new Skill(
        name: 'PHP',
        level: 'Expert',
        keywords: ['OOP', 'Laravel', 'Testing']
    );

    $this->resume->addSkills($skill);

    $retrievedSkills = $this->resume->getSkills();

    expect($retrievedSkills)->toBeArray()
        ->and($retrievedSkills[0])->toBe($skill);
});

it('can add a single language', function (): void {
    $language = new Language(language: 'English', fluency: 'Native');

    $this->resume->addLanguages($language);

    expect($this->resume->getLanguages())->toHaveCount(1)
        ->and($this->resume->getLanguages()[0])->toBe($language);
});

it('can add multiple languages', function (): void {
    $language1 = new Language(language: 'English', fluency: 'Native');
    $language2 = new Language(language: 'Spanish', fluency: 'Fluent');

    $this->resume->addLanguages($language1, $language2);

    expect($this->resume->getLanguages())->toHaveCount(2)
        ->and($this->resume->getLanguages())->toContain($language1, $language2);
});

it('returns itself after adding languages', function (): void {
    $language = new Language(language: 'English', fluency: 'Native');

    $result = $this->resume->addLanguages($language);

    expect($result)->toBe($this->resume);
});

it('can retrieve added languages', function (): void {
    $language = new Language(language: 'English', fluency: 'Native');

    $this->resume->addLanguages($language);

    $retrievedLanguages = $this->resume->getLanguages();

    expect($retrievedLanguages)->toBeArray()
        ->and($retrievedLanguages[0])->toBe($language);
});
