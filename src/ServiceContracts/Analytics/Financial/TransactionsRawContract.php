<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Analytics\Financial;

use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetByTypeParams;
use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetByTypeResponseItem;
use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetSummaryParams;
use Onlyfansapi\Analytics\Financial\Transactions\TransactionGetSummaryResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
