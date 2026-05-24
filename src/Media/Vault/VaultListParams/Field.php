<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault\VaultListParams;

/**
 * Sort the results by a field. Default `recent`.
 */
enum Field: string
{
    case RECENT = 'recent';

    case MOST_LIKED = 'most-liked';

    case HIGHEST_TIPS = 'highest-tips';
}
