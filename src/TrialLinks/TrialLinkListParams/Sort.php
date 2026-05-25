<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks\TrialLinkListParams;

/**
 * Sort the results. Default `desc`.
 */
enum Sort: string
{
    case DESC = 'desc';

    case ASC = 'asc';
}
