<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Transactions\TransactionListParams;
use OnlyFansAPI\Transactions\TransactionListResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TransactionsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|TransactionListParams $params
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
    ): BaseResponse;
}
