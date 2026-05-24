<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\ServiceContracts\AnalyticsContract;
use Onlyfansapi\Services\Analytics\FinancialService;
use Onlyfansapi\Services\Analytics\SummaryService;

final class AnalyticsService implements AnalyticsContract
{
    /**
     * @api
     */
    public AnalyticsRawService $raw;

    /**
     * @api
     */
    public FinancialService $financial;

    /**
     * @api
     */
    public SummaryService $summary;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AnalyticsRawService($client);
        $this->financial = new FinancialService($client);
        $this->summary = new SummaryService($client);
    }
}
