<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Analytics\Financial;

use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetHistoryParams;
use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetHistoryResponseItem;
use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityParams;
use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponseItem;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
