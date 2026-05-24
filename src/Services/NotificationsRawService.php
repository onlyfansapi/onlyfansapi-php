<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Notifications\NotificationGetCountsResponse;
use Onlyfansapi\Notifications\NotificationListParams;
use Onlyfansapi\Notifications\NotificationListParams\SkipUsers;
use Onlyfansapi\Notifications\NotificationListParams\Type;
use Onlyfansapi\Notifications\NotificationListResponse;
use Onlyfansapi\Notifications\NotificationMarkAllAsReadResponse;
use Onlyfansapi\Notifications\NotificationSearchUsersParams;
use Onlyfansapi\Notifications\NotificationSearchUsersResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\NotificationsRawContract;

/**
 * Endpoints for managingr account notifications.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
