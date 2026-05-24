<?php

namespace Onlyfansapi\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Onlyfansapi Not Found Exception';
}
