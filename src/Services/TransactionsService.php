<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\TransactionsContract;
use Onlyfansapi\Transactions\TransactionListResponse;

/**
 * APIs for managing OnlyFans transactions.
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
     * Get a paginated list of transactions for an Account. Newest transactions are first.
     *
     * @param string $account The Account ID
     * @param string $limit The number of transactions to return. Recommended: `10`
     * @param string $marker The marker used for pagination. Default: `null`
     * @param string $startDate The start date for transactions list. Default: `-30days`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?string $limit = null,
        ?string $marker = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): TransactionListResponse {
        $params = Util::removeNulls(
            ['limit' => $limit, 'marker' => $marker, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
