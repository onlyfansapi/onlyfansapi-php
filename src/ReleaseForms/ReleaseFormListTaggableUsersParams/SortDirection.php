<?php

declare(strict_types=1);

namespace OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersParams;

/**
 * Sort direction: `desc` or `asc`.
 */
enum SortDirection: string
{
    case DESC = 'desc';

    case ASC = 'asc';
}
