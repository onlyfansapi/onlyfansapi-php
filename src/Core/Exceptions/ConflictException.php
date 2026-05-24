<?php

namespace Onlyfansapi\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Onlyfansapi Conflict Exception';
}
