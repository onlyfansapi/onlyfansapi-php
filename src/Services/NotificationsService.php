<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Notifications\NotificationGetCountsResponse;
use Onlyfansapi\Notifications\NotificationListParams\SkipUsers;
use Onlyfansapi\Notifications\NotificationListParams\Type;
use Onlyfansapi\Notifications\NotificationListResponse;
use Onlyfansapi\Notifications\NotificationMarkAllAsReadResponse;
use Onlyfansapi\Notifications\NotificationSearchUsersResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\NotificationsContract;
use Onlyfansapi\Services\Notifications\TabsOrderService;

/**
 * Endpoints for managingr account notifications.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class NotificationsService implements NotificationsContract
{
    /**
     * @api
     */
    public NotificationsRawService $raw;

    /**
     * @api
     */
    public TabsOrderService $tabsOrder;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NotificationsRawService($client);
        $this->tabsOrder = new TabsOrderService($client);
    }

    /**
     * @api
     *
     * List all notifications for the account
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
    ): NotificationListResponse {
        $params = Util::removeNulls(
            [
                'fromID' => $fromID,
                'limit' => $limit,
                'skipUsers' => $skipUsers,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a quick overview of all unread notification types
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCounts(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): NotificationGetCountsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getCounts($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark all notifications of this account as read
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function markAllAsRead(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): NotificationMarkAllAsReadResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->markAllAsRead($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Search users that have appeared in your notifications
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
    ): NotificationSearchUsersResponse {
        $params = Util::removeNulls(['query' => $query]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->searchUsers($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
