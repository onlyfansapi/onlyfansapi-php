<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Chats\ChatDeleteResponse;
use Onlyfansapi\Chats\ChatHideResponse;
use Onlyfansapi\Chats\ChatListMediaParams\Type;
use Onlyfansapi\Chats\ChatListMediaResponse;
use Onlyfansapi\Chats\ChatListParams\Filter;
use Onlyfansapi\Chats\ChatListParams\Order;
use Onlyfansapi\Chats\ChatListParams\SkipUsers;
use Onlyfansapi\Chats\ChatListResponse;
use Onlyfansapi\Chats\ChatMarkAsReadResponse;
use Onlyfansapi\Chats\ChatMarkAsUnreadResponse;
use Onlyfansapi\Chats\ChatMuteResponse;
use Onlyfansapi\Chats\ChatStartTypingResponse;
use Onlyfansapi\Chats\ChatUnmuteResponse;
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
     * @param string $chatID The ID of the chat to delete, usually a fan's OnlyFans User ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $chatID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ChatDeleteResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to hide, usually a fan's OnlyFans User ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function hide(
        string $chatID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ChatHideResponse;

    /**
     * @api
     *
     * @param string $chatID Path param: The ID of the chat to get media from, usually a fan's OnlyFans User ID
     * @param string $account Path param: The Account ID
     * @param string $limit Query param: Number of medias to return. Default = 20
     * @param string $offset Query param: Number of medias to skip for pagination
     * @param string $skipUsers Query param: Whether to skip user details in response (all or none). Default = all
     * @param Type|value-of<Type>|null $type Query param: Filter by specific media types. Keep empty to return all.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listMedia(
        string $chatID,
        string $account,
        ?string $limit = null,
        ?string $offset = null,
        ?string $skipUsers = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): ChatListMediaResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to mark as read, usually a fan's OnlyFans User ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function markAsRead(
        string $chatID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ChatMarkAsReadResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to mark as read, usually a fan's OnlyFans User ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function markAsUnread(
        string $chatID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ChatMarkAsUnreadResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to mute, usually a fan's OnlyFans User ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function mute(
        string $chatID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ChatMuteResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startTyping(
        string $chatID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ChatStartTypingResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to unmute, usually a fan's OnlyFans User ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unmute(
        string $chatID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): ChatUnmuteResponse;
}
