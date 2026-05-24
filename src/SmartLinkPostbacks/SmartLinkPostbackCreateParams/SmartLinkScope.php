<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackCreateParams;

/**
 * `global` fires for all Smart Links. `campaign_specific` fires only for selected Smart Links.
 */
enum SmartLinkScope: string
{
    case GLOBAL = 'global';

    case CAMPAIGN_SPECIFIC = 'campaign_specific';
}
