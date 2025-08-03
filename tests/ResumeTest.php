<?php

declare(strict_types=1);

use Muliacode\Resumify\Enums\EducationType;
use Muliacode\Resumify\Enums\LanguageFluencyLevel;
use Muliacode\Resumify\Enums\Network;
use Muliacode\Resumify\Enums\SkillLevel;
use Muliacode\Resumify\Models\Award;
use Muliacode\Resumify\Models\Basics;
use Muliacode\Resumify\Models\Certificate;
use Muliacode\Resumify\Models\Education;
use Muliacode\Resumify\Models\Interest;
use Muliacode\Resumify\Models\Language;
use Muliacode\Resumify\Models\Location;
use Muliacode\Resumify\Models\Profile;
use Muliacode\Resumify\Models\Project;
use Muliacode\Resumify\Models\Publication;
use Muliacode\Resumify\Models\Reference;
use Muliacode\Resumify\Models\Skill;
use Muliacode\Resumify\Models\Volunteer;
use Muliacode\Resumify\Models\Work;
use Muliacode\Resumify\Resume;

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
        studyType: EducationType::Bachelor,
        startDate: '2015-01-01',
        endDate: '2019-01-01',
        score: 4.0,
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
        studyType: EducationType::Bachelor,
        startDate: '2015-01-01',
        endDate: '2019-01-01',
        score: 4.0,
        courses: ['Algorithms', 'Data Structures']
    );

    $education2 = Education::create(
        institution: 'University B',
        url: 'https://universityb.com',
        area: 'Software Engineering',
        studyType: EducationType::Master,
        startDate: '2020-01-01',
        endDate: '2022-01-01',
        score: 4.0,
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
        studyType: EducationType::Bachelor,
        startDate: '2015-01-01',
        endDate: '2019-01-01',
        score: 4.0,
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
        level: SkillLevel::Expert,
        keywords: ['OOP', 'Laravel', 'Testing']
    );

    $this->resume->addSkills($skill);

    expect($this->resume->getSkills())->toHaveCount(1)
        ->and($this->resume->getSkills()[0])->toBe($skill);
});

it('can add multiple skills', function (): void {
    $skill1 = new Skill(
        name: 'PHP',
        level: SkillLevel::Expert,
        keywords: ['OOP', 'Laravel', 'Testing']
    );

    $skill2 = new Skill(
        name: 'JavaScript',
        level: SkillLevel::Intermediate,
        keywords: ['React', 'Vue', 'Node']
    );

    $this->resume->addSkills($skill1, $skill2);

    expect($this->resume->getSkills())->toHaveCount(2)
        ->and($this->resume->getSkills())->toContain($skill1, $skill2);
});

it('returns itself after adding skills', function (): void {
    $skill = new Skill(
        name: 'PHP',
        level: SkillLevel::Expert,
        keywords: ['OOP', 'Laravel', 'Testing']
    );

    $result = $this->resume->addSkills($skill);

    expect($result)->toBe($this->resume);
});

it('can retrieve added skills', function (): void {
    $skill = new Skill(
        name: 'PHP',
        level: SkillLevel::Expert,
        keywords: ['OOP', 'Laravel', 'Testing']
    );

    $this->resume->addSkills($skill);

    $retrievedSkills = $this->resume->getSkills();

    expect($retrievedSkills)->toBeArray()
        ->and($retrievedSkills[0])->toBe($skill);
});

it('can add a single language', function (): void {
    $language = new Language(language: 'English', fluency: LanguageFluencyLevel::NATIVE);

    $this->resume->addLanguages($language);

    expect($this->resume->getLanguages())->toHaveCount(1)
        ->and($this->resume->getLanguages()[0])->toBe($language);
});

it('can add multiple languages', function (): void {
    $language1 = new Language(language: 'English', fluency:  LanguageFluencyLevel::NATIVE);
    $language2 = new Language(language: 'Spanish', fluency:  LanguageFluencyLevel::B1);

    $this->resume->addLanguages($language1, $language2);

    expect($this->resume->getLanguages())->toHaveCount(2)
        ->and($this->resume->getLanguages())->toContain($language1, $language2);
});
it('can add a single interest', function (): void {
    $interest = new Interest(
        name: 'Music',
        keywords: ['Piano', 'Guitar', 'Classical']
    );

    $this->resume->addInterests($interest);

    expect($this->resume->getInterests())->toHaveCount(1)
        ->and($this->resume->getInterests()[0])->toBe($interest);
});

it('can add multiple interests', function (): void {
    $interest1 = new Interest(
        name: 'Music',
        keywords: ['Piano', 'Guitar', 'Classical']
    );

    $interest2 = new Interest(
        name: 'Sports',
        keywords: ['Soccer', 'Basketball', 'Tennis']
    );

    $this->resume->addInterests($interest1, $interest2);

    expect($this->resume->getInterests())->toHaveCount(2)
        ->and($this->resume->getInterests())->toContain($interest1, $interest2);
});

it('returns itself after adding interests', function (): void {
    $interest = new Interest(
        name: 'Music',
        keywords: ['Piano', 'Guitar', 'Classical']
    );

    $result = $this->resume->addInterests($interest);

    expect($result)->toBe($this->resume);
});

it('can retrieve added interests', function (): void {
    $interest = new Interest(
        name: 'Music',
        keywords: ['Piano', 'Guitar', 'Classical']
    );

    $this->resume->addInterests($interest);

    $retrievedInterests = $this->resume->getInterests();

    expect($retrievedInterests)->toBeArray()
        ->and($retrievedInterests[0])->toBe($interest);
});
it('returns itself after adding languages', function (): void {
    $language = new Language(language: 'English', fluency:  LanguageFluencyLevel::NATIVE);

    $result = $this->resume->addLanguages($language);

    expect($result)->toBe($this->resume);
});

it('can retrieve added languages', function (): void {
    $language = new Language(language: 'English', fluency:  LanguageFluencyLevel::NATIVE);

    $this->resume->addLanguages($language);

    $retrievedLanguages = $this->resume->getLanguages();

    expect($retrievedLanguages)->toBeArray()
        ->and($retrievedLanguages[0])->toBe($language);
});

it('can add a single reference', function (): void {
    $reference = new Reference(name: 'John Smith', reference: 'Great team player');

    $this->resume->addReferences($reference);

    expect($this->resume->getReferences())->toHaveCount(1)
        ->and($this->resume->getReferences()[0])->toBe($reference);
});

it('can add multiple references', function (): void {
    $reference1 = new Reference(name: 'John Smith', reference: 'Great team player');
    $reference2 = new Reference(name: 'Jane Doe', reference: 'Excellent project manager');

    $this->resume->addReferences($reference1, $reference2);

    expect($this->resume->getReferences())->toHaveCount(2)
        ->and($this->resume->getReferences())->toContain($reference1, $reference2);
});

it('returns itself after adding references', function (): void {
    $reference = new Reference(name: 'John Smith', reference: 'Great team player');

    $result = $this->resume->addReferences($reference);

    expect($result)->toBe($this->resume);
});

it('can retrieve added references', function (): void {
    $reference = new Reference(name: 'John Smith', reference: 'Great team player');

    $this->resume->addReferences($reference);

    $retrievedReferences = $this->resume->getReferences();

    expect($retrievedReferences)->toBeArray()
        ->and($retrievedReferences[0])->toBe($reference);
});

it('can add a single project', function (): void {
    $project = new Project(
        name: 'Web Platform',
        description: 'Developed a web application for e-commerce.',
        highlights: ['Responsive design', 'Payment gateway integration'],
        keywords: ['e-commerce', 'PHP', 'Laravel'],
        startDate: '2022-01-01',
        endDate: '2023-01-01',
        url: 'https://example.com/project',
        roles: ['Developer', 'Technical Lead'],
        entity: 'Organization A',
        type: 'Professional'
    );

    $this->resume->addProjects($project);

    expect($this->resume->getProjects())->toHaveCount(1)
        ->and($this->resume->getProjects()[0])->toBe($project);
});

it('can add multiple projects', function (): void {
    $project1 = new Project(
        name: 'Web Platform',
        description: 'Developed a web application for e-commerce.',
        highlights: ['Responsive design', 'Payment gateway integration'],
        keywords: ['e-commerce', 'PHP', 'Laravel'],
        startDate: '2022-01-01',
        endDate: '2023-01-01',
        url: 'https://example.com/project1',
        roles: ['Developer', 'Technical Lead'],
        entity: 'Organization A',
        type: 'Professional'
    );

    $project2 = new Project(
        name: 'Mobile App',
        description: 'Built a mobile app for fitness tracking.',
        highlights: ['Step counting', 'Calorie tracking'],
        keywords: ['fitness', 'Java', 'Android'],
        startDate: '2023-02-01',
        endDate: '2024-02-01',
        url: 'https://example.com/project2',
        roles: ['Developer'],
        entity: 'Organization B',
        type: 'Personal'
    );

    $this->resume->addProjects($project1, $project2);

    expect($this->resume->getProjects())->toHaveCount(2)
        ->and($this->resume->getProjects())->toContain($project1, $project2);
});

it('returns itself after adding projects', function (): void {
    $project = new Project(
        name: 'Web Platform',
        description: 'Developed a web application for e-commerce.',
        highlights: ['Responsive design', 'Payment gateway integration'],
        keywords: ['e-commerce', 'PHP', 'Laravel'],
        startDate: '2022-01-01',
        endDate: '2023-01-01',
        url: 'https://example.com/project',
        roles: ['Developer', 'Technical Lead'],
        entity: 'Organization A',
        type: 'Professional'
    );

    $result = $this->resume->addProjects($project);

    expect($result)->toBe($this->resume);
});

it('can retrieve added projects', function (): void {
    $project = new Project(
        name: 'Web Platform',
        description: 'Developed a web application for e-commerce.',
        highlights: ['Responsive design', 'Payment gateway integration'],
        keywords: ['e-commerce', 'PHP', 'Laravel'],
        startDate: '2022-01-01',
        endDate: '2023-01-01',
        url: 'https://example.com/project',
        roles: ['Developer', 'Technical Lead'],
        entity: 'Organization A',
        type: 'Professional'
    );

    $this->resume->addProjects($project);

    $retrievedProjects = $this->resume->getProjects();

    expect($retrievedProjects)->toBeArray()
        ->and($retrievedProjects[0])->toBe($project);
});

it('can create a complete valid resume', function (): void {
    $resume = Resume::create();

    $resume->basics(Basics::create(
        name: 'John Doe',
        label: 'Software Developer',
        image: 'https://example.com/photo.jpg',
        email: 'john@example.com',
        phone: '(555) 555-5555',
        url: 'https://johndoe.com',
        summary: 'Experienced software developer with 10+ years in the industry',
        location: Location::create(
            address: "Stationsstraat 7",
            postalCode: '1000AA',
            city: 'Amsterdam',
            countryCode: 'NL',
            region: 'Noord-Holland'
        ),
        profiles: [
            Profile::create(Network::Github, 'johndoe', 'https://github.com/johndoe'),
        ]
    ));

    $resume->addWork(new Work(
        name: 'Tech Corp',
        location: 'New York',
        description: 'Enterprise software development',
        position: 'Senior Developer',
        url: 'https://techcorp.com',
        startDate: '2020-01-01',
        endDate: '2023-12-31',
        summary: 'Led development team',
        highlights: ['Increased performance by 50%']
    ));

    $resume->addVolunteer(new Volunteer(
        organization: 'Code for Good',
        position: 'Mentor',
        url: 'https://codeforgood.org',
        startDate: '2022-01-01',
        endDate: '2023-12-31',
        summary: 'Mentored junior developers',
        highlights: ['Helped 20+ developers']
    ));

    $resume->addEducation(Education::create(
        institution: 'Tech University',
        url: 'https://techuniversity.edu',
        area: 'Computer Science',
        studyType: EducationType::Bachelor,
        startDate: '2010-09-01',
        endDate: '2014-05-31',
        score: 3.8,
        courses: ['Data Structures', 'Algorithms']
    ));

    $resume->addAwards(Award::create(
        title: 'Developer of the Year',
        date: '2023-12-01',
        awarder: 'Tech Association',
        summary: 'Recognition for outstanding contributions'
    ));

    $resume->addCertificates(Certificate::create(
        name: 'Advanced PHP Certification',
        date: '2023-06-15',
        url: 'https://cert.php-foundation.org/12345',
        issuer: 'PHP Foundation'
    ));

    //    $resume->addPublications(Publication::create(
    //        name: 'Modern PHP Development',
    //        publisher: 'Tech Books Inc',
    //        releaseDate: '2023-03-01',
    //        url: 'https://techbooks.com/modern-php',
    //        summary: 'Comprehensive guide to PHP development'
    //    ));

    $resume->addSkills(Skill::create(
        name: 'PHP',
        level: SkillLevel::Beginner,
        keywords: ['Laravel', 'Symfony', 'Testing']
    ));

    $resume->addLanguages(Language::create(
        language: 'English',
        fluency:  LanguageFluencyLevel::NATIVE
    ));

    $resume->addInterests(Interest::create(
        name: 'Open Source',
        keywords: ['PHP', 'JavaScript', 'Community']
    ));

    $resume->addReferences(Reference::create(
        name: 'Jane Smith',
        reference: 'Excellent team player and technical leader'
    ));

    $resume->addProjects(Project::create(
        name: 'Enterprise CMS',
        description: 'Built a custom CMS',
        highlights: ['Scalable architecture'],
        keywords: ['PHP', 'Laravel', 'Vue.js'],
        startDate: '2022-01-01',
        endDate: '2023-06-30',
        url: 'https://project-cms.com',
        roles: ['Lead Developer'],
        entity: 'Tech Corp',
        type: 'Professional'
    ), Project::create('CRM System'));

    $resume->validate();

    $summary = $resume->summarize();

    expect($summary)->toBeArray()
        ->and($summary["name"])->toBe("John Doe")
        ->and($summary["email"])->toBe("john@example.com")
        ->and($summary["work_experiences"])->toBe(1)
        ->and($summary["education_entries"])->toBe(1)
        ->and($summary["skills"])->toBe(1)
        ->and($summary["languages"])->toBe(1)
        ->and($summary["certificates"])->toBe(1)
        ->and($summary["projects"])->toBe(2)
        ->and($summary["awards"])->toBe(1)
        ->and($summary["has_awards"])->toBeTrue()
        ->and($summary["publications"])->toBe(0)
        ->and($summary["has_publications"])->toBeFalse();
});

test('jsonSerialize serializes an empty Resume correctly', function (): void {
    $resume = Resume::create();
    $json = $resume->jsonSerialize();

    expect(array_keys($json))->toContain('basics')
        ->and($json['basics'])->not->toBeNull()
        ->and($json)->not->toHaveKey('work')
        ->and($json)->not->toHaveKey('skills')
        ->and($json)->not->toHaveKey('languages');
});

test('jsonSerialize serializes a Resume with data correctly', function (): void {
    $resume = Resume::create();

    $resume->basics(Basics::create(
        name: 'John Doe',
        label: 'Software Developer',
        image: 'https://example.com/photo.jpg',
        email: 'john@example.com',
        phone: '(555) 555-5555',
        url: 'https://johndoe.com',
        summary: 'Experienced software developer with 10+ years in the industry',
        location: Location::create(
            address: "Stationsstraat 7",
            postalCode: '1000AA',
            city: 'Amsterdam',
            countryCode: 'NL',
            region: 'Noord-Holland'
        ),
        profiles: [
            Profile::create(Network::Github, 'johndoe', 'https://github.com/johndoe'),
        ]
    ));

    $resume->addWork(new Work(
        name: 'Tech Corp',
        location: 'New York',
        description: 'Enterprise software development',
        position: 'Senior Developer',
        url: 'https://techcorp.com',
        startDate: '2020-01-01',
        endDate: '2023-12-31',
        summary: 'Led development team',
        highlights: ['Increased performance by 50%']
    ));

    $resume->addVolunteer(new Volunteer(
        organization: 'Code for Good',
        position: 'Mentor',
        url: 'https://codeforgood.org',
        startDate: '2022-01-01',
        endDate: '2023-12-31',
        summary: 'Mentored junior developers',
        highlights: ['Helped 20+ developers']
    ));

    $resume->addEducation(Education::create(
        institution: 'Tech University',
        url: 'https://techuniversity.edu',
        area: 'Computer Science',
        studyType: EducationType::Bachelor,
        startDate: '2010-09-01',
        endDate: '2014-05-31',
        score: 3.8,
        courses: ['Data Structures', 'Algorithms']
    ));

    $resume->addAwards(Award::create(
        title: 'Developer of the Year',
        date: '2023-12-01',
        awarder: 'Tech Association',
        summary: 'Recognition for outstanding contributions'
    ));

    $resume->addCertificates(Certificate::create(
        name: 'Advanced PHP Certification',
        date: '2023-06-15',
        url: 'https://cert.php-foundation.org/12345',
        issuer: 'PHP Foundation'
    ));

    $resume->addPublications(Publication::create(
        name: 'Modern PHP Development',
        publisher: 'Tech Books Inc',
        releaseDate: '2023-03-01',
        url: 'https://techbooks.com/modern-php',
        summary: 'Comprehensive guide to PHP development'
    ));

    $resume->addSkills(Skill::create(
        name: 'PHP',
        level: SkillLevel::Beginner,
        keywords: ['Laravel', 'Symfony', 'Testing']
    ));

    $resume->addLanguages(Language::create(
        language: 'English',
        fluency:  LanguageFluencyLevel::NATIVE
    ));

    $resume->addInterests(Interest::create(
        name: 'Open Source',
        keywords: ['PHP', 'JavaScript', 'Community']
    ));

    $resume->addReferences(Reference::create(
        name: 'Jane Smith',
        reference: 'Excellent team player and technical leader'
    ));

    $resume->addProjects(Project::create(
        name: 'Enterprise CMS',
        description: 'Built a custom CMS',
        highlights: ['Scalable architecture'],
        keywords: ['PHP', 'Laravel', 'Vue.js'],
        startDate: '2022-01-01',
        endDate: '2023-06-30',
        url: 'https://project-cms.com',
        roles: ['Lead Developer'],
        entity: 'Tech Corp',
        type: 'Professional'
    ), Project::create('CRM System'));

    $resume->validate();

    $json = $resume->jsonSerialize();

    expect(array_keys($json))->toContain(
        'basics',
        'work',
        'skills',
        'languages',
        'publications',
        'awards',
        'certificates',
        'projects',
        'interests',
        'references',
        'volunteer',
        'education'
    )
        ->and($json['work'])->toHaveCount(1)
        ->and($json['skills'])->toHaveCount(1)
        ->and($json['languages'])->toHaveCount(1)
        ->and($json['publications'])->toHaveCount(1)
        ->and($json['awards'])->toHaveCount(1)
        ->and($json['certificates'])->toHaveCount(1)
        ->and($json['projects'])->toHaveCount(2)
        ->and($json['interests'])->toHaveCount(1)
        ->and($json['references'])->toHaveCount(1)
        ->and($json['volunteer'])->toHaveCount(1)
        ->and($json['education'])->toHaveCount(1);
});
