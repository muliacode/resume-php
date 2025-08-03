# A lightweight PHP package for creating and exporting resume profiles to standardized formats like JSON-Resume, Europass, and HR-XML

[![Latest Version on Packagist](https://img.shields.io/packagist/v/muliacode/resume-php.svg?style=flat-square)](https://packagist.org/packages/muliacode/resume-php)
[![Tests](https://img.shields.io/github/actions/workflow/status/muliacode/resume-php/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/muliacode/resume-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/muliacode/resume-php.svg?style=flat-square)](https://packagist.org/packages/muliacode/resume-php)


## Installation

You can install the package via composer:

```bash
composer require muliacode/resume-php
```

## Usage

```php
// Create a new Resume instance
$resume = Muliacode\Resume\Resume::create();

// Add basic information
$resume->basics(
    Muliacode\Resume\Models\Basics::create(
        'John Doe',
        'Software Developer',
        'https://example.com/profile.jpg',
        'john.doe@example.com',
        '+1 (555) 123-4567',
        'https://johndoe.com',
        'Experienced software developer with a passion for clean code and problem-solving.',
        Muliacode\Resume\Models\Location::create(
            'San Francisco',
            'CA',
            'USA',
            '94105',
            'Market Street',
            '123'
        ),
        [
            Muliacode\Resume\Models\Profile::create(
                'GitHub',
                'johndoe',
                'https://github.com/johndoe'
            ),
            Muliacode\Resume\Models\Profile::create(
                'LinkedIn',
                'johndoe',
                'https://linkedin.com/in/johndoe'
            )
        ]
    )
);

// Add work experience
$resume->addWork(
    Muliacode\Resume\Models\Work::create(
        'Acme Inc.',
        'San Francisco, CA',
        'Technology company focused on innovative solutions',
        'Senior Software Developer',
        'https://acme.com',
        '2020-01-01',
        '2023-07-31',
        'Led development of core products and mentored junior developers',
        [
            'Developed and maintained RESTful APIs',
            'Implemented CI/CD pipelines',
            'Reduced system response time by 40%'
        ]
    )
);

// Add education
$resume->addEducation(
    Muliacode\Resume\Models\Education::create(
        'University of Technology',
        'San Francisco, CA',
        'Computer Science',
        'Bachelor of Science',
        '2014-09-01',
        '2018-06-30',
        '3.8 GPA',
        [
            'Dean\'s List 2016-2018',
            'Senior Project: Distributed Systems Architecture'
        ]
    )
);

// Add skills
$resume->addSkills(
    Muliacode\Resume\Models\Skill::create(
        'Programming',
        'Advanced',
        [
            'PHP', 'JavaScript', 'Python', 'SQL'
        ]
    )
);

// Add languages
$resume->addLanguages(
    Muliacode\Resume\Models\Language::create(
        'English',
        'Native'
    )
);

// Validate and finalize the resume
$resume->done();

// Export to JSON (JSON Resume format)
$jsonResume = json_encode($resume, JSON_PRETTY_PRINT);
echo $jsonResume;

// You can also access the resume data as an array
$resumeArray = $resume->summarize();
```

For more detailed examples and advanced usage, please check the [documentation](https://github.com/muliacode/resume-php/wiki).

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
