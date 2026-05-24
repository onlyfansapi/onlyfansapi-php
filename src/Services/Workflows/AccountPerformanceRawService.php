<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Workflows;

use Onlyfansapi\Client;
use Onlyfansapi\ServiceContracts\Workflows\AccountPerformanceRawContract;

final class AccountPerformanceRawService implements AccountPerformanceRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
