<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Fans\FanGetSubscriptionHistoryResponse;
use Onlyfansapi\Fans\FanListActiveParams\Filter;
use Onlyfansapi\Fans\FanListActiveParams\Type;
use Onlyfansapi\Fans\FanListActiveResponse;
use Onlyfansapi\Fans\FanListAllResponse;
use Onlyfansapi\Fans\FanListExpiredResponse;
use Onlyfansapi\Fans\FanListLatestResponse;
use Onlyfansapi\Fans\FanListTopParams\By;
use Onlyfansapi\Fans\FanListTopResponse;
use Onlyfansapi\Fans\FanSetCustomNameResponse;
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
     * @param string $userID the OnlyFans ID of the User
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscriptionHistory(
        string $userID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): FanGetSubscriptionHistoryResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param Filter|FilterShape $filter
     * @param int $limit Number of fans to return (1-50). Must be at least 1. Must not be greater than 20.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $query search within fan name/username
     * @param Type|value-of<Type> $type filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListActiveResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param \Onlyfansapi\Fans\FanListAllParams\Filter|FilterShape1 $filter
     * @param int $limit Number of fans to return (1-50). Must be at least 1. Must not be greater than 20.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $query search within fan name/username
     * @param \Onlyfansapi\Fans\FanListAllParams\Type|value-of<\Onlyfansapi\Fans\FanListAllParams\Type> $type filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        \Onlyfansapi\Fans\FanListAllParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        \Onlyfansapi\Fans\FanListAllParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListAllResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param \Onlyfansapi\Fans\FanListExpiredParams\Filter|FilterShape2 $filter
     * @param int $limit Number of fans to return (1-50). Must be at least 1. Must not be greater than 20.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $query search within fan name/username
     * @param \Onlyfansapi\Fans\FanListExpiredParams\Type|value-of<\Onlyfansapi\Fans\FanListExpiredParams\Type> $type filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        \Onlyfansapi\Fans\FanListExpiredParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        \Onlyfansapi\Fans\FanListExpiredParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListExpiredResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string|null $endDate End date for filtering (required with start_date). This field is required when <code>start_date</code> is present.
     * @param int $limit Number of fans to return (1-50). Must be at least 1. Must not be greater than 100.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $startDate Start date for filtering (required with end_date). This field is required when <code>end_date</code> is present.
     * @param \Onlyfansapi\Fans\FanListLatestParams\Type|value-of<\Onlyfansapi\Fans\FanListLatestParams\Type>|null $type filter by type: total, renew, or new
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listLatest(
        string $account,
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $startDate = null,
        \Onlyfansapi\Fans\FanListLatestParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListLatestResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param By|value-of<By>|null $by sort by: total (default), subscribes, tips, messages, post, streams
     * @param string|null $endDate End date for filtering (required with start_date). This field is required when <code>start_date</code> is present.
     * @param string|null $startDate Start date for filtering (required with end_date). This field is required when <code>end_date</code> is present.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTop(
        string $account,
        By|string|null $by = null,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListTopResponse;

    /**
     * @api
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param string $account Path param: The Account ID
     * @param string $customName Body param: New Custom Name for a Fan. Send empty string (`""`) or `null` to clear out the custom name.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setCustomName(
        string $fanID,
        string $account,
        string $customName,
        RequestOptions|array|null $requestOptions = null,
    ): FanSetCustomNameResponse;
}
