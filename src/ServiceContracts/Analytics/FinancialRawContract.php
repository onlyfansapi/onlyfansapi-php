<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Analytics;

use Onlyfansapi\Analytics\Financial\FinancialGetForecastParams;
use Onlyfansapi\Analytics\Financial\FinancialGetForecastResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
