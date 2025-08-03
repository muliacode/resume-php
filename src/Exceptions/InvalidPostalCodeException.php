<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Exceptions;

use InvalidArgumentException;
use Throwable;

final class InvalidPostalCodeException extends InvalidArgumentException
{
    public function __construct(
        string    $postalCode,
        string    $countryCode,
        int       $code = 0,
        ?Throwable $previous = null
    ) {
        $message = sprintf(
            'Postal Code "%s" is not valid for country "%s".',
            $postalCode,
            $countryCode,
        );
        parent::__construct($message, $code, $previous);
    }
}
