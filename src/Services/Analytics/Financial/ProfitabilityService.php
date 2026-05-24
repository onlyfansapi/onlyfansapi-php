<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Analytics\Financial;

use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetHistoryResponseItem;
use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponseItem;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Analytics\Financial\ProfitabilityContract;

/**
 * APIs for retrieving financial analytics data.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class ProfitabilityService implements ProfitabilityContract
{
    /**
     * @api
     */
    public ProfitabilityRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ProfitabilityRawService($client);
    }

    /**
     * @api
     *
     * Get historical profitability data for a specific account over multiple months.
     *
     * @param string $account The Account ID
     * @param string $accountPrefixedID the account prefixed ID
     * @param int $months Number of months of history to retrieve (1-60, default 12). Must be at least 1. Must not be greater than 60.
     * @param RequestOpts|null $requestOptions
     *
     * @return list<ProfitabilityGetHistoryResponseItem>
     *
     * @throws APIException
     */
    public function getHistory(
        string $account,
        string $accountPrefixedID,
        ?int $months = null,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            ['accountPrefixedID' => $accountPrefixedID, 'months' => $months]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getHistory($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Calculate profitability for creators including revenue, costs, commissions, and margins for a specific month.
     *
     * @param list<string> $accountIDs Array of account prefixed IDs
     * @param int $month The month to calculate profitability for (1-12)
     * @param int $year The year to calculate profitability for
     * @param RequestOpts|null $requestOptions
     *
     * @return list<ProfitabilityGetProfitabilityResponseItem>
     *
     * @throws APIException
     */
    public function getProfitability(
        array $accountIDs,
        int $month,
        int $year,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            ['accountIDs' => $accountIDs, 'month' => $month, 'year' => $year]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getProfitability(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
