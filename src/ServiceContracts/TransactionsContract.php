<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Transactions\TransactionListResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface TransactionsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $limit The number of transactions to return. Recommended: `10`
     * @param string $marker The marker used for pagination. Default: `null`
     * @param string $startDate The start date for transactions list. Default: `-30days`
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
    ): TransactionListResponse;
}
