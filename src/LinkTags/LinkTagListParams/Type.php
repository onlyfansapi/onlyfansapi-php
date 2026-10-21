<?php

declare(strict_types=1);

namespace OnlyFansAPI\LinkTags\LinkTagListParams;

/**
 * Filter by link type. If not provided, returns tags for all types.
 */
enum Type: string
{
    case TRIAL_LINKS = 'trial_links';

    case TRACKING_LINKS = 'tracking_links';

    case SMART_LINKS = 'smart_links';
}
