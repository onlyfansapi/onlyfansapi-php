<?php

declare(strict_types=1);

namespace Onlyfansapi\Search\SearchProfilesParams;

/**
 * Direction for sorting. `desc` - highest value first. `asc` - lowest value first.
 */
enum SortDirection: string
{
    case DESC = 'desc';

    case ASC = 'asc';
}
