<?php

declare(strict_types=1);

namespace Muliacode\Resumify\Exceptions;

use InvalidArgumentException;
use Throwable;

final class InvalidCountryCodeException extends InvalidArgumentException
{
    public function __construct(
        string    $countryCode,
        int       $code = 0,
        ?Throwable $previous = null
    ) {
        $message = sprintf(
            'Country Code "%s" is not a valid Country Code.',
            $countryCode,
        );
        parent::__construct($message, $code, $previous);
    }
}
