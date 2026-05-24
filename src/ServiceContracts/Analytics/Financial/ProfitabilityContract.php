<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Analytics\Financial;

use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetHistoryResponseItem;
use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponseItem;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface ProfitabilityContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $months Number of months of history to retrieve (1-60, default 12)
     * @param RequestOpts|null $requestOptions
     *
     * @return list<ProfitabilityGetHistoryResponseItem>
     *
     * @throws APIException
     */
    public function getHistory(
        string $account,
        ?int $months = null,
        RequestOptions|array|null $requestOptions = null,
    ): array;

    /**
     * @api
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
    ): array;
}
