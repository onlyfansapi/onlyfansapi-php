<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Analytics\Financial;

use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetHistoryParams;
use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetHistoryResponseItem;
use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityParams;
use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponseItem;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface ProfitabilityRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ProfitabilityGetHistoryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ProfitabilityGetHistoryResponseItem>>
     *
     * @throws APIException
     */
    public function getHistory(
        string $account,
        array|ProfitabilityGetHistoryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ProfitabilityGetProfitabilityParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ProfitabilityGetProfitabilityResponseItem>>
     *
     * @throws APIException
     */
    public function getProfitability(
        array|ProfitabilityGetProfitabilityParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
