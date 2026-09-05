<?php

namespace OnlyFansAPI\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'OnlyFansAPI Permission Denied Exception';
}
