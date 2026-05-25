<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks\TrackingLinkListParams;

/**
 * Sort by subscriber count (claims), or creation date.
 */
enum Sortby: string
{
    case CLAIMS = 'claims';

    case CREATED_DATE = 'created_date';
}
