<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks\TrackingLinkListParams;

/**
 * Sort direction. Default `desc`.
 */
enum Sort: string
{
    case ASC = 'asc';

    case DESC = 'desc';
}
