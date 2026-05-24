<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Analytics\Financial;

use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetByTypeParams;
use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetByTypeResponseItem;
use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetSummaryParams;
use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetSummaryResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Conversion\ListOf;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Analytics\Financial\TransactionsRawContract;

/**
 * APIs for retrieving financial analytics data.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class TransactionsRawService implements TransactionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get transaction totals grouped by transaction type (subscriptions, tips, messages, etc.).
     *
     * @param array{
     *   accountIDs: list<string>, endDate: string, startDate: string
     * }|TransactionGetByTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<TransactionGetByTypeResponseItem>>
     *
     * @throws APIException
     */
    public function getByType(
        array|TransactionGetByTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransactionGetByTypeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/analytics/financial/transactions/by-type',
            body: (object) $parsed,
            options: $options,
            convert: new ListOf(TransactionGetByTypeResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Get transaction summary including counts for succeeded, refunded, and disputed transactions, plus gross, net, and fee totals.
     *
     * @param array{
     *   accountIDs: list<string>, endDate: string, startDate: string
     * }|TransactionGetSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TransactionGetSummaryResponse>
     *
     * @throws APIException
     */
    public function getSummary(
        array|TransactionGetSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransactionGetSummaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/analytics/financial/transactions/summary',
            body: (object) $parsed,
            options: $options,
            convert: TransactionGetSummaryResponse::class,
        );
    }
}
