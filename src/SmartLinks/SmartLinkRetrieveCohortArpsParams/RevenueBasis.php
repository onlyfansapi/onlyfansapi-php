<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkRetrieveCohortArpsParams;

/**
 * Revenue basis. Defaults to `net`.
 */
enum RevenueBasis: string
{
    case NET = 'net';

    case GROSS = 'gross';
}
