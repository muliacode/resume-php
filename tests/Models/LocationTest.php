<?php

declare(strict_types=1);

use Muliacode\Resume\Models\Location;

it('can be instantiated with constructor parameter and all data', function (): void {
    $location = Location::create(
        address: '1234 Main Street',
        postalCode: '12345',
        city: 'Anytown',
        countryCode: 'US',
        region: 'NY'
    )->validate();

    expect($location->getAddress())->toBe('1234 Main Street')
        ->and($location->getPostalCode())->toBe('12345')
        ->and($location->getCity())->toBe('Anytown')
        ->and($location->getCountryCode())->toBe('US')
        ->and($location->getRegion())->toBe('NY');
});

it('can be instantiated with setters and all data', function (): void {
    $location = Location::create()
        ->setAddress('1234 Main Street')
        ->setPostalCode('12345')
        ->setCity('Anytown')
        ->setCountryCode('US')
        ->setRegion('NY');

    expect($location->getAddress())->toBe('1234 Main Street')
        ->and($location->getPostalCode())->toBe('12345')
        ->and($location->getCity())->toBe('Anytown')
        ->and($location->getCountryCode())->toBe('US')
        ->and($location->getRegion())->toBe('NY');
});

it('can convert to array', function (): void {
    $location = Location::create(
        address: '1234 Main Street',
        postalCode: '12345'
    );

    $array = $location->toArray();

    expect($array)->toBeArray()
        ->and($array['address'])->toBe('1234 Main Street')
        ->and($array['postalCode'])->toBe('12345')
        ->and($array)->toHaveKeys(['address', 'postalCode', 'city', 'countryCode', 'region']);
});
