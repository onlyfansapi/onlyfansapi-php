<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Chargebacks\ChargebackCalculateRatioParams;
use Onlyfansapi\Chargebacks\ChargebackCalculateRatioResponse;
use Onlyfansapi\Chargebacks\ChargebackListParams;
use Onlyfansapi\Chargebacks\ChargebackListResponse;
use Onlyfansapi\Chargebacks\ChargebackListStatisticsParams;
use Onlyfansapi\Chargebacks\ChargebackListStatisticsResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
