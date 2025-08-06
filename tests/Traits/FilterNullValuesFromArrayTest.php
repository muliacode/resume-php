<?php

namespace Muliacode\Resumify\Tests\Traits;

use Muliacode\Resumify\Traits\FilterNullValuesFromArray;

test('filterNullValues removes null values from array', function () {
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

test('jsonSerialize removes null values based on getJsonData', function () {
    $trait = new class implements \JsonSerializable {
        use FilterNullValuesFromArray;

        public function getJsonData(): array
        {
            return ['a' => 1, 'b' => null, 'c' => 3];
        }
    };

    $result = $trait->jsonSerialize();
    expect($result)->toBe(['a' => 1, 'c' => 3]);
});

test('jsonSerialize throws exception if getJsonData not implemented', function () {
    $trait = new class {
        use FilterNullValuesFromArray;
    };

    expect(fn() => $trait->jsonSerialize())->toThrow(\BadMethodCallException::class, 'Classes using FiltersNullValuesForJson trait must implement a getJsonData() method.');
});

test('filterNullValues keeps non-null values', function () {
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

test('filterNullValues handles empty arrays', function () {
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
