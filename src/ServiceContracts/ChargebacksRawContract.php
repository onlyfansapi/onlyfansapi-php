<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Chargebacks\ChargebackCalculateRatioParams;
use OnlyFansAPI\Chargebacks\ChargebackCalculateRatioResponse;
use OnlyFansAPI\Chargebacks\ChargebackListParams;
use OnlyFansAPI\Chargebacks\ChargebackListResponse;
use OnlyFansAPI\Chargebacks\ChargebackListStatisticsParams;
use OnlyFansAPI\Chargebacks\ChargebackListStatisticsResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface ChargebacksRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ChargebackListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChargebackListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|ChargebackListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ChargebackCalculateRatioParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChargebackCalculateRatioResponse>
     *
     * @throws APIException
     */
    public function calculateRatio(
        string $account,
        array|ChargebackCalculateRatioParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ChargebackListStatisticsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChargebackListStatisticsResponse>
     *
     * @throws APIException
     */
    public function listStatistics(
        string $account,
        array|ChargebackListStatisticsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
