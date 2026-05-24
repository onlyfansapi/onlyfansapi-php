<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Chargebacks\ChargebackCalculateRatioParams;
use Onlyfansapi\Chargebacks\ChargebackCalculateRatioResponse;
use Onlyfansapi\Chargebacks\ChargebackListParams;
use Onlyfansapi\Chargebacks\ChargebackListResponse;
use Onlyfansapi\Chargebacks\ChargebackListStatisticsParams;
use Onlyfansapi\Chargebacks\ChargebackListStatisticsResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ChargebacksRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class ChargebacksRawService implements ChargebacksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of chargebacks within a specified date range. Possible statuses are `loading`, `done`, `undo`.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string,
     *   limit?: string|null,
     *   offset?: string|null,
     *   startDate?: string,
     * }|ChargebackListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ChargebackListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/chargebacks', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: ChargebackListResponse::class,
        );
    }

    /**
     * @api
     *
     * The Chargeback Ratio reflects the number of chargebacks compared to the total number of payments as a percentage. Ideally, your Chargeback Ratio should be under 1%.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string, startDate?: string
     * }|ChargebackCalculateRatioParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ChargebackCalculateRatioParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/chargebacks/ratio', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: ChargebackCalculateRatioResponse::class,
        );
    }

    /**
     * @api
     *
     * List chargeback counts & amounts per hour, day or month.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string, startDate?: string
     * }|ChargebackListStatisticsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ChargebackListStatisticsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/chargebacks/statistics', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: ChargebackListStatisticsResponse::class,
        );
    }
}
