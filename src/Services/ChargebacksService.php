<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Chargebacks\ChargebackCalculateRatioResponse;
use Onlyfansapi\Chargebacks\ChargebackListResponse;
use Onlyfansapi\Chargebacks\ChargebackListStatisticsResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ChargebacksContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class ChargebacksService implements ChargebacksContract
{
    /**
     * @api
     */
    public ChargebacksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChargebacksRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a list of chargebacks within a specified date range. Possible statuses are `loading`, `done`, `undo`.
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
    ): ChargebackListResponse {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'limit' => $limit,
                'offset' => $offset,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * The Chargeback Ratio reflects the number of chargebacks compared to the total number of payments as a percentage. Ideally, your Chargeback Ratio should be under 1%.
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
    ): ChargebackCalculateRatioResponse {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->calculateRatio($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List chargeback counts & amounts per hour, day or month.
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
    ): ChargebackListStatisticsResponse {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listStatistics($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
