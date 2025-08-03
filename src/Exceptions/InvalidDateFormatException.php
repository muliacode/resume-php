<?php

declare(strict_types=1);

namespace Muliacode\Resume\Exceptions;

use InvalidArgumentException;
use Throwable;

final class InvalidDateFormatException extends InvalidArgumentException
{
    public function __construct(
        string $date,
        string $format,
        int $code = 0,
        ?Throwable $previous = null
    ) {
        $message = sprintf(
            'Date "%s" does not match the expected format "%s".',
            $date,
            $format
        );
        parent::__construct($message, $code, $previous);
    }
}
