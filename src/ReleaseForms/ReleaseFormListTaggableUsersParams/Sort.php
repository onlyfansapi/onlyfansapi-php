<?php

declare(strict_types=1);

namespace OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersParams;

/**
 * Sort field: `date` or `name`.
 */
enum Sort: string
{
    case DATE = 'date';

    case NAME = 'name';
}
