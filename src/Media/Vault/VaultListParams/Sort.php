<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault\VaultListParams;

/**
 * Sort the results. Default `desc`.
 */
enum Sort: string
{
    case DESC = 'desc';

    case ASC = 'asc';
}
