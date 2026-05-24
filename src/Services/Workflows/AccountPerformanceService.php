<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Workflows;

use Onlyfansapi\Client;
use Onlyfansapi\ServiceContracts\Workflows\AccountPerformanceContract;

final class AccountPerformanceService implements AccountPerformanceContract
{
    /**
     * @api
     */
    public AccountPerformanceRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccountPerformanceRawService($client);
    }
}
