<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Analytics\Financial;

use OnlyFansAPI\Analytics\Financial\Transactions\TransactionGetByTypeResponseItem;
use OnlyFansAPI\Analytics\Financial\Transactions\TransactionGetSummaryResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TransactionsContract
{
    /**
     * @api
     *
     * @param list<string> $accountIDs Array of account prefixed IDs
     * @param string $endDate The end date (ISO 8601 format)
     * @param string $startDate The start date (ISO 8601 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return list<TransactionGetByTypeResponseItem>
     *
     * @throws APIException
     */
    public function getByType(
        array $accountIDs,
        string $endDate,
        string $startDate,
        RequestOptions|array|null $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param list<string> $accountIDs Array of account prefixed IDs
     * @param string $endDate The end date (ISO 8601 format)
     * @param string $startDate The start date (ISO 8601 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSummary(
        array $accountIDs,
        string $endDate,
        string $startDate,
        RequestOptions|array|null $requestOptions = null,
    ): TransactionGetSummaryResponse;
}
