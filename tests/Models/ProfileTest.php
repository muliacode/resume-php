<?php

declare(strict_types=1);

use Muliacode\Resume\Enums\Network;
use Muliacode\Resume\Models\Profile;

it('can be instantiated with constructor parameter and all data', function (): void {
    $profile = Profile::create(
        network: Network::Github,
        username: 'johndoe',
        url: 'https://johndoe.github.io'
    )->validate();

    expect($profile->getNetwork())->toBe(Network::Github)
        ->and($profile->getUsername())->toBe('johndoe')
        ->and($profile->getUrl())->toBe('https://johndoe.github.io');
});

it('can be instantiated with setters and all data', function (): void {
    $profile = Profile::create(
        network: Network::Github,
        username: 'johndoe',
    );

    expect($profile->getNetwork())->toBe(Network::Github)
        ->and($profile->getUsername())->toBe('johndoe')
        ->and($profile->getUrl())->toBeNull();

    $profile->setUrl('https://johndoe.github.io');

    expect($profile->getNetwork())->toBe(Network::Github)
        ->and($profile->getUsername())->toBe('johndoe')
        ->and($profile->getUrl())->toBe('https://johndoe.github.io');
});

it('can convert to array', function (): void {
    $profile = Profile::create(
        network: Network::Github,
        username: 'johndoe',
    );

    $array = $profile->toArray();

    expect($array)->toBeArray()
        ->and($array['network'])->toBe(Network::Github)
        ->and($array['username'])->toBe('johndoe')
        ->and($array)->toHaveKeys(['network', 'username', 'url']);
});
