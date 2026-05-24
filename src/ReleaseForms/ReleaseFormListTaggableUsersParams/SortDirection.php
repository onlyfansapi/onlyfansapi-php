<?php

declare(strict_types=1);

namespace Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams;

/**
 * Sort direction: `desc` or `asc`.
 */
enum SortDirection: string
{
    case DESC = 'desc';

    case ASC = 'asc';
}
