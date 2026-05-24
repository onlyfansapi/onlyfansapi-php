<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkCreateParams;

/**
 * The type of Smart Link to create.
 */
enum LinkType: string
{
    case FREE_TRIAL = 'free_trial';

    case TRACKING_LINK = 'tracking_link';
}
