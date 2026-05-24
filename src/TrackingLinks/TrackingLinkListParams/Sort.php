<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks\TrackingLinkListParams;

/**
 * Sort the results. Default `desc`.
 */
enum Sort: string
{
    case DESC = 'desc';

    case ASC = 'asc';
}
