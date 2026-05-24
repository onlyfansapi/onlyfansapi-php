<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Chargebacks\ChargebackCalculateRatioResponse;
use Onlyfansapi\Chargebacks\ChargebackListResponse;
use Onlyfansapi\Chargebacks\ChargebackListStatisticsResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface ChargebacksContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate The end date for the chargebacks. Keep empty to get all.
     * @param string|null $limit Number of chargebacks to return (1-100). Default = 10
     * @param string|null $offset number of chargebacks to skip, used for pagination
     * @param string $startDate The start date for the chargebacks. Keep empty to get all.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?string $endDate = null,
        ?string $limit = null,
        ?string $offset = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): ChargebackListResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate The end date for the chargeback ratio. Keep empty to get all.
     * @param string $startDate The start date for the chargeback ratio. Keep empty to get all.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function calculateRatio(
        string $account,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): ChargebackCalculateRatioResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate The end date for the chargebacks. Keep empty to get all.
     * @param string $startDate The start date for the chargebacks. Keep empty to get all.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listStatistics(
        string $account,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): ChargebackListStatisticsResponse;
}
