<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\ServiceContracts\WorkflowsContract;
use Onlyfansapi\Services\Workflows\AccountPerformanceService;

final class WorkflowsService implements WorkflowsContract
{
    /**
     * @api
     */
    public WorkflowsRawService $raw;

    /**
     * @api
     */
    public AccountPerformanceService $accountPerformance;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WorkflowsRawService($client);
        $this->accountPerformance = new AccountPerformanceService($client);
    }
}
