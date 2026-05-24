<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Fans\FanListActiveParams\Filter;
use Onlyfansapi\Fans\FanListActiveResponse;
use Onlyfansapi\Fans\FanListAllResponse;
use Onlyfansapi\Fans\FanListExpiredResponse;
use Onlyfansapi\Fans\FanListLatestResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListActiveParams\Filter
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface FansContract
{
    /**
     * @api
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
    ): FanListActiveResponse;

    /**
     * @api
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
    ): FanListAllResponse;

    /**
     * @api
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
    ): FanListExpiredResponse;

    /**
     * @api
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
    ): FanListLatestResponse;
}
