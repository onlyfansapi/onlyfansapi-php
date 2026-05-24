<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\TransactionsRawContract;
use Onlyfansapi\Transactions\TransactionListParams;
use Onlyfansapi\Transactions\TransactionListResponse;

/**
 * APIs for managing OnlyFans transactions.
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
     * Get a paginated list of transactions for an Account. Newest transactions are first. You can filter by transaction type and tips source.
     *
     * @param string $account The Account ID
     * @param array{
     *   limit?: string,
     *   marker?: string,
     *   startDate?: string,
     *   tipsSource?: string,
     *   type?: string,
     * }|TransactionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TransactionListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|TransactionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransactionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/transactions', $account],
            query: $parsed,
            options: $options,
            convert: TransactionListResponse::class,
        );
    }
}
