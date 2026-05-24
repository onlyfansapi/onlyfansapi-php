<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Chats\ChatListParams\Filter;
use Onlyfansapi\Chats\ChatListParams\Order;
use Onlyfansapi\Chats\ChatListParams\SkipUsers;
use Onlyfansapi\Chats\ChatListResponse;
use Onlyfansapi\Chats\ChatStartTypingIndicatorResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface ChatsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param Filter|value-of<Filter> $filter optionally, filter the chats by type
     * @param string $limit Number of chats to return (1 - 100). Default = 10
     * @param string $offset Number of chats to skip for pagination
     * @param Order|value-of<Order> $order Sort order for chats (recent or old). Default = recent
     * @param string $query Search query to filter chats
     * @param SkipUsers|value-of<SkipUsers> $skipUsers Whether to skip user details in response (all or none). Default = all
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        Filter|string|null $filter = null,
        ?string $limit = null,
        ?string $offset = null,
        Order|string|null $order = null,
        ?string $query = null,
        SkipUsers|string|null $skipUsers = null,
        RequestOptions|array|null $requestOptions = null,
    ): ChatListResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startTypingIndicator(
        string $chatID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ChatStartTypingIndicatorResponse;
}
