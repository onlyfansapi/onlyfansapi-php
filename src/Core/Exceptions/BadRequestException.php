<?php

namespace Onlyfansapi\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Onlyfansapi Bad Request Exception';
}
