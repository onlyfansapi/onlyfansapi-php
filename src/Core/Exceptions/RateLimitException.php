<?php

namespace Onlyfansapi\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Onlyfansapi Rate Limit Exception';
}
