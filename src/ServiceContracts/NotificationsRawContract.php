<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Notifications\NotificationGetCountsResponse;
use Onlyfansapi\Notifications\NotificationListParams;
use Onlyfansapi\Notifications\NotificationListResponse;
use Onlyfansapi\Notifications\NotificationMarkAllAsReadResponse;
use Onlyfansapi\Notifications\NotificationSearchUsersParams;
use Onlyfansapi\Notifications\NotificationSearchUsersResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
