<?php

namespace Onlyfansapi\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Onlyfansapi Permission Denied Exception';
}
