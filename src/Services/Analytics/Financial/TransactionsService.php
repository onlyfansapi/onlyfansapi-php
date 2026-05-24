<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Analytics\Financial;

use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetByTypeResponseItem;
use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetSummaryResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Analytics\Financial\TransactionsContract;

/**
 * APIs for retrieving financial analytics data.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class TransactionsService implements TransactionsContract
{
    /**
     * @api
     */
    public TransactionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TransactionsRawService($client);
    }

    /**
     * @api
     *
     * Get transaction totals grouped by transaction type (subscriptions, tips, messages, etc.).
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
    ): array {
        $params = Util::removeNulls(
            [
                'accountIDs' => $accountIDs,
                'endDate' => $endDate,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByType(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get transaction summary including counts for succeeded, refunded, and disputed transactions, plus gross, net, and fee totals.
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
    ): TransactionGetSummaryResponse {
        $params = Util::removeNulls(
            [
                'accountIDs' => $accountIDs,
                'endDate' => $endDate,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSummary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
