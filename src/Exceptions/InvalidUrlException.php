<?php

declare(strict_types=1);

namespace Muliacode\Resume\Exceptions;

use InvalidArgumentException;
use Throwable;

final class InvalidUrlException extends InvalidArgumentException
{
    public function __construct(
        string    $url,
        int       $code = 0,
        ?Throwable $previous = null
    ) {
        $message = sprintf(
            '"%s" is not a valid URL.',
            $url,
        );
        parent::__construct($message, $code, $previous);
    }
}
