<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\ServiceContracts\AnalyticsContract;
use OnlyFansAPI\Services\Analytics\FinancialService;
use OnlyFansAPI\Services\Analytics\SummaryService;

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
