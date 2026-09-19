<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks\TrialLinkListParams;

/**
 * Sort direction. Default `desc`.
 */
enum Sort: string
{
    case ASC = 'asc';

    case DESC = 'desc';
}
