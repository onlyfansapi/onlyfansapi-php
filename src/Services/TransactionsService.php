<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\TransactionsContract;
use OnlyFansAPI\Transactions\TransactionListResponse;

/**
 * APIs for managing OnlyFans transactions.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     * Get a paginated list of transactions for an Account. Newest transactions are first. You can filter by transaction type and tips source.
     *
     * @param string $account The Account ID
     * @param string $limit The number of transactions to return. Recommended: `10`
     * @param string $marker The marker used for pagination. Default: `null`
     * @param string $startDate The start date for the transactions list. Defaults to 30 days ago.
     * @param string $tipsSource Filter tips by source. Only applies when `type=tips`. Options: `profile`, `post_all`, `chat`, `stream`, `story`
     * @param string $type Filter by transaction type. Options: `subscribes`, `tips`, `post`, `chat_messages`, `stream`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?string $limit = null,
        ?string $marker = null,
        ?string $startDate = null,
        ?string $tipsSource = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): TransactionListResponse {
        $params = Util::removeNulls(
            [
                'limit' => $limit,
                'marker' => $marker,
                'startDate' => $startDate,
                'tipsSource' => $tipsSource,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
