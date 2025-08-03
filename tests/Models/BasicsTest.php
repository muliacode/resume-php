<?php

declare(strict_types=1);

use Muliacode\Resume\Enums\Network;
use Muliacode\Resume\Models\Basics;
use Muliacode\Resume\Models\Location;
use Muliacode\Resume\Models\Profile;

it('can be instantiated with constructor parameter and all data', function (): void {
    $location = Location::create();
    $profiles = [
        Profile::create(Network::Github, 'johndoe'),
        Profile::create(Network::LinkedIn, 'johndoe'),
    ];
    $personalInfo = new Basics(
        name: 'John Doe',
        label: 'Software Engineer',
        image: 'john.jpg',
        email: 'john@example.com',
        phone: '123-456-7890',
        url: 'https://john.doe',
        summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        location: $location,
        profiles: $profiles
    );

    expect($personalInfo->getName())->toBe('John Doe')
        ->and($personalInfo->getEmail())->toBe('john@example.com')
        ->and($personalInfo->getPhone())->toBe('123-456-7890')
        ->and($personalInfo->getLabel())->toBe('Software Engineer')
        ->and($personalInfo->getImage())->toBe('john.jpg')
        ->and($personalInfo->getUrl())->toBe('https://john.doe')
        ->and($personalInfo->getSummary())->toBe('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
        ->and($personalInfo->getLocation())->toBe($location)
        ->and($personalInfo->getProfiles())->toBe($profiles);
});

it('can be instantiated with setts and all data', function (): void {
    $profiles = [
        Profile::create(Network::Github, 'johndoe'),
        Profile::create(Network::LinkedIn, 'johndoe'),
    ];
    $personalInfo = Basics::create()
        ->setName('John Doe')
        ->setLabel('Software Engineer')
        ->setImage('john.jpg')
        ->setEmail('john@example.com')
        ->setPhone('123-456-7890')
        ->setUrl('https://john.doe')
        ->setSummary('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
        ->setLocation(Location::create())
        ->setProfiles($profiles);


    expect($personalInfo->getName())->toBe('John Doe')
        ->and($personalInfo->getEmail())->toBe('john@example.com')
        ->and($personalInfo->getPhone())->toBe('123-456-7890')
        ->and($personalInfo->getLabel())->toBe('Software Engineer')
        ->and($personalInfo->getImage())->toBe('john.jpg')
        ->and($personalInfo->getUrl())->toBe('https://john.doe')
        ->and($personalInfo->getSummary())->toBe('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
        ->and($personalInfo->getLocation())->toBeInstanceOf(Location::class)
        ->and($personalInfo->getProfiles())->toBe($profiles);
});

it('can be instantiated with constructor parameters', function (): void {
    $personalInfo = new Basics(
        name: 'John Doe',
        email: 'john@example.com',
        phone: '123-456-7890'
    );

    expect($personalInfo->getName())->toBe('John Doe')
        ->and($personalInfo->getEmail())->toBe('john@example.com')
        ->and($personalInfo->getPhone())->toBe('123-456-7890');
});

it('can be created with the create method', function (): void {
    $personalInfo = Basics::create(
        name: 'Jane Doe',
        email: 'jane@example.com'
    );

    expect($personalInfo)->toBeInstanceOf(Basics::class)
        ->and($personalInfo->getName())->toBe('Jane Doe')
        ->and($personalInfo->getEmail())->toBe('jane@example.com');
});

it('can convert to array', function (): void {
    $personalInfo = Basics::create(
        name: 'John Doe',
        email: 'john@example.com'
    );

    $array = $personalInfo->toArray();

    expect($array)->toBeArray()
        ->and($array['name'])->toBe('John Doe')
        ->and($array['email'])->toBe('john@example.com')
        ->and($array)->toHaveKeys(['name', 'label', 'image', 'email', 'phone', 'url', 'summary']);
});
