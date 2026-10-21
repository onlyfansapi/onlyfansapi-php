<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Analytics\Financial;

use OnlyFansAPI\Analytics\Financial\Transactions\TransactionGetByTypeParams;
use OnlyFansAPI\Analytics\Financial\Transactions\TransactionGetByTypeResponseItem;
use OnlyFansAPI\Analytics\Financial\Transactions\TransactionGetSummaryParams;
use OnlyFansAPI\Analytics\Financial\Transactions\TransactionGetSummaryResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TransactionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TransactionGetByTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<TransactionGetByTypeResponseItem>>
     *
     * @throws APIException
     */
    public function getByType(
        array|TransactionGetByTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TransactionGetSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TransactionGetSummaryResponse>
     *
     * @throws APIException
     */
    public function getSummary(
        array|TransactionGetSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
