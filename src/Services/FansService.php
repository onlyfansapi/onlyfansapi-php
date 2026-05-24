<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Fans\FanListActiveParams\Filter;
use Onlyfansapi\Fans\FanListActiveResponse;
use Onlyfansapi\Fans\FanListAllResponse;
use Onlyfansapi\Fans\FanListExpiredResponse;
use Onlyfansapi\Fans\FanListLatestResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\FansContract;

/**
 * APIs for managing OnlyFans fans (subscribers).
 *
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListActiveParams\Filter
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class FansService implements FansContract
{
    /**
     * @api
     */
    public FansRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FansRawService($client);
    }

    /**
     * @api
     *
     * Get a paginated list of fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param Filter|FilterShape $filter
     * @param string|null $limit Number of fans to return (1-50)
     * @param string|null $offset Number of fans to skip
     * @param string|null $type Filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        Filter|array|null $filter = null,
        ?string $limit = null,
        ?string $offset = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListActiveResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listActive($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param \Onlyfansapi\Fans\FanListAllParams\Filter|FilterShape1 $filter
     * @param string|null $limit Number of fans to return (1-50)
     * @param string|null $offset Number of fans to skip
     * @param string|null $type Filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        \Onlyfansapi\Fans\FanListAllParams\Filter|array|null $filter = null,
        ?string $limit = null,
        ?string $offset = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListAllResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listAll($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of expired fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param \Onlyfansapi\Fans\FanListExpiredParams\Filter|FilterShape2 $filter
     * @param string|null $limit Number of fans to return (1-50)
     * @param string|null $offset Number of fans to skip
     * @param string|null $type Filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        \Onlyfansapi\Fans\FanListExpiredParams\Filter|array|null $filter = null,
        ?string $limit = null,
        ?string $offset = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListExpiredResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listExpired($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list fans, filterable by total, only new subscribers, or only renewals. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param string|null $endDate End date for filtering (required with start_date)
     * @param string|null $limit Number of fans to return (1-100)
     * @param string|null $offset Number of fans to skip
     * @param string|null $startDate Start date for filtering (required with end_date)
     * @param string|null $type Filter by type: total, renew, or new
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listLatest(
        string $account,
        ?string $endDate = null,
        ?string $limit = null,
        ?string $offset = null,
        ?string $startDate = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListLatestResponse {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'limit' => $limit,
                'offset' => $offset,
                'startDate' => $startDate,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listLatest($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
