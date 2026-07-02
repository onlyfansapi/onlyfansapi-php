<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Analytics\Financial;

use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetHistoryResponse;
use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface ProfitabilityContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $accountPrefixedID the account prefixed ID
     * @param int $months Number of months of history to retrieve (1-60, default 12). Must be at least 1. Must not be greater than 60.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getHistory(
        string $account,
        string $accountPrefixedID,
        ?int $months = null,
        RequestOptions|array|null $requestOptions = null,
    ): ProfitabilityGetHistoryResponse;

    /**
     * @api
     *
     * @param list<string> $accountIDs Array of account prefixed IDs
     * @param int $month The month to calculate profitability for (1-12)
     * @param int $year The year to calculate profitability for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getProfitability(
        array $accountIDs,
        int $month,
        int $year,
        RequestOptions|array|null $requestOptions = null,
    ): ProfitabilityGetProfitabilityResponse;
}
