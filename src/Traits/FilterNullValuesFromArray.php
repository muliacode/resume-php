<?php

namespace Muliacode\Resumify\Traits;

trait FilterNullValuesFromArray
{
    /**
     * @param array<mixed> $data
     * @return array<mixed>
     */
    protected function filterNullValues(array $data): array
    {
        return array_filter($data, function ($value) {
            return $value !== null;
        });
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        if (method_exists($this, 'getJsonData')) {
            return $this->filterNullValues($this->getJsonData());
        }

        // Fallback or error handling if getJsonData is not implemented
        throw new \BadMethodCallException('Classes using FiltersNullValuesForJson trait must implement a getJsonData() method.');
    }
}
