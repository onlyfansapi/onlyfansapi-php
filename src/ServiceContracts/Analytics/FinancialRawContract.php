<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Analytics;

use OnlyFansAPI\Analytics\Financial\FinancialGetForecastParams;
use OnlyFansAPI\Analytics\Financial\FinancialGetForecastResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface FinancialRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FinancialGetForecastParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FinancialGetForecastResponse>
     *
     * @throws APIException
     */
    public function getForecast(
        array|FinancialGetForecastParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
