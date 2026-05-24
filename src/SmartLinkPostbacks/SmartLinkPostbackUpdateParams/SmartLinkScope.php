<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateParams;

/**
 * `global` or `campaign_specific`.
 */
enum SmartLinkScope: string
{
    case GLOBAL = 'global';

    case CAMPAIGN_SPECIFIC = 'campaign_specific';
}
