# ResumifyPHP
[![Latest Version on Packagist](https://img.shields.io/packagist/v/muliacode/resumify-php)](https://packagist.org/packages/muliacode/resumify-php)
[![Tests](https://img.shields.io/github/actions/workflow/status/muliacode/resumify-php/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/muliacode/resumify-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/muliacode/resumify-php?style=flat-square)](https://packagist.org/packages/muliacode/resumify-php)
![GitHub License](https://img.shields.io/github/license/muliacode/resumify-php)


A lightweight PHP package for creating and exporting resume profiles to standardized formats like json-resume.

## Installation
You can install the package via composer:

```bash
composer require muliacode/resumify-php
```

## Usage

```php
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

$resume->addWork(Work::create(
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

$resume->addVolunteer(Volunteer::create(
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

$summary = $resume->summarize();

// Laravel controller response example
return response()->json([
    'summary' => $summary,
    'resume' => $resume
]);
```

For more detailed examples and advanced usage, please check the [documentation](https://github.com/muliacode/resumify-php/wiki).

## Testing

```bash
composer test
```

or (with additional checks such as styling, static anaylsis, etc.)

```bash
composer test:complete
```

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details on how to contribute to this project.

## Security Vulnerabilities
Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits
- [Noah Scharrenberg](https://github.com/nscharrenberg)
- [All Contributors](../../contributors)

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
