<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Tests\Traits;

use Muliacode\Resumify\Traits\FilterNullValuesFromArray;
use BadMethodCallException;
use JsonSerializable;

test('filterNullValues removes null values from array', function (): void {
    $trait = new class {
        use FilterNullValuesFromArray;

        public function filter(array $data): array
        {
            return $this->filterNullValues($data);
        }
    };

    $result = $trait->filter(['a' => 1, 'b' => null, 'c' => 3]);
    expect($result)->toBe(['a' => 1, 'c' => 3]);
});

test('jsonSerialize removes null values based on getJsonData', function (): void {
    $trait = new class implements JsonSerializable {
        use FilterNullValuesFromArray;

        public function getJsonData(): array
        {
            return ['a' => 1, 'b' => null, 'c' => 3];
        }
    };

    $result = $trait->jsonSerialize();
    expect($result)->toBe(['a' => 1, 'c' => 3]);
});

test('jsonSerialize throws exception if getJsonData not implemented', function (): void {
    $trait = new class {
        use FilterNullValuesFromArray;
    };

    expect(fn (): array => $trait->jsonSerialize())->toThrow(BadMethodCallException::class, 'Classes using FiltersNullValuesForJson trait must implement a getJsonData() method.');
});

test('filterNullValues keeps non-null values', function (): void {
    $trait = new class {
        use FilterNullValuesFromArray;

        public function filter(array $data): array
        {
            return $this->filterNullValues($data);
        }
    };

    $result = $trait->filter(['a' => 0, 'b' => false, 'c' => '']);
    expect($result)->toBe(['a' => 0, 'b' => false, 'c' => '']);
});

test('filterNullValues handles empty arrays', function (): void {
    $trait = new class {
        use FilterNullValuesFromArray;

        public function filter(array $data): array
        {
            return $this->filterNullValues($data);
        }
    };

    $result = $trait->filter([]);
    expect($result)->toBe([]);
});
