<?php

namespace OnlyFansAPI\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OnlyFansAPI Rate Limit Exception';
}
