<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Notifications\NotificationGetCountsResponse;
use OnlyFansAPI\Notifications\NotificationListParams;
use OnlyFansAPI\Notifications\NotificationListResponse;
use OnlyFansAPI\Notifications\NotificationMarkAllAsReadResponse;
use OnlyFansAPI\Notifications\NotificationSearchUsersParams;
use OnlyFansAPI\Notifications\NotificationSearchUsersResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface NotificationsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|NotificationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|NotificationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationGetCountsResponse>
     *
     * @throws APIException
     */
    public function getCounts(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationMarkAllAsReadResponse>
     *
     * @throws APIException
     */
    public function markAllAsRead(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|NotificationSearchUsersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotificationSearchUsersResponse>
     *
     * @throws APIException
     */
    public function searchUsers(
        string $account,
        array|NotificationSearchUsersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
