<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Notifications\NotificationGetCountsResponse;
use OnlyFansAPI\Notifications\NotificationListParams\SkipUsers;
use OnlyFansAPI\Notifications\NotificationListParams\Type;
use OnlyFansAPI\Notifications\NotificationListResponse;
use OnlyFansAPI\Notifications\NotificationMarkAllAsReadResponse;
use OnlyFansAPI\Notifications\NotificationSearchUsersResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface NotificationsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $fromID Used for pagination. This value should be the ID of the previous response's last notification.
     * @param int $limit The number of notifications. Default `10`
     * @param SkipUsers|value-of<SkipUsers> $skipUsers Whether to skip user details. Default `all`
     * @param Type|value-of<Type> $type Filter notifications by a specific type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $fromID = null,
        ?int $limit = null,
        SkipUsers|string|null $skipUsers = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): NotificationListResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCounts(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): NotificationGetCountsResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function markAllAsRead(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): NotificationMarkAllAsReadResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $query The query to search for. Can be either a name or username.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function searchUsers(
        string $account,
        string $query,
        RequestOptions|array|null $requestOptions = null,
    ): NotificationSearchUsersResponse;
}
