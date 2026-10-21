<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Notifications\NotificationGetCountsResponse;
use OnlyFansAPI\Notifications\NotificationListParams;
use OnlyFansAPI\Notifications\NotificationListParams\SkipUsers;
use OnlyFansAPI\Notifications\NotificationListParams\Type;
use OnlyFansAPI\Notifications\NotificationListResponse;
use OnlyFansAPI\Notifications\NotificationMarkAllAsReadResponse;
use OnlyFansAPI\Notifications\NotificationSearchUsersParams;
use OnlyFansAPI\Notifications\NotificationSearchUsersResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\NotificationsRawContract;

/**
 * Endpoints for managingr account notifications.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class NotificationsRawService implements NotificationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all notifications for the account
     *
     * @param string $account The Account ID
     * @param array{
     *   fromID?: int,
     *   limit?: int,
     *   skipUsers?: SkipUsers|value-of<SkipUsers>,
     *   type?: value-of<Type>,
     * }|NotificationListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = NotificationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/notifications', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['fromID' => 'from_id', 'skipUsers' => 'skip_users']
            ),
            options: $options,
            convert: NotificationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a quick overview of all unread notification types
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/notifications/counts', $account],
            options: $requestOptions,
            convert: NotificationGetCountsResponse::class,
        );
    }

    /**
     * @api
     *
     * Mark all notifications of this account as read
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/notifications/mark-all-as-read', $account],
            options: $requestOptions,
            convert: NotificationMarkAllAsReadResponse::class,
        );
    }

    /**
     * @api
     *
     * Search users that have appeared in your notifications
     *
     * @param string $account The Account ID
     * @param array{query: string}|NotificationSearchUsersParams $params
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
    ): BaseResponse {
        [$parsed, $options] = NotificationSearchUsersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/notifications/search-users', $account],
            query: $parsed,
            options: $options,
            convert: NotificationSearchUsersResponse::class,
        );
    }
}
