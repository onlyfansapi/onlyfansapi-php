<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Chats\ChatDeleteResponse;
use OnlyFansAPI\Chats\ChatHideResponse;
use OnlyFansAPI\Chats\ChatListMediaParams\Type;
use OnlyFansAPI\Chats\ChatListMediaResponse;
use OnlyFansAPI\Chats\ChatListParams\Filter;
use OnlyFansAPI\Chats\ChatListParams\Order;
use OnlyFansAPI\Chats\ChatListParams\SkipUsers;
use OnlyFansAPI\Chats\ChatListResponse;
use OnlyFansAPI\Chats\ChatMarkAsReadResponse;
use OnlyFansAPI\Chats\ChatMarkAsUnreadResponse;
use OnlyFansAPI\Chats\ChatMuteResponse;
use OnlyFansAPI\Chats\ChatStartTypingResponse;
use OnlyFansAPI\Chats\ChatUnmuteResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\ChatsContract;
use OnlyFansAPI\Services\Chats\MarkAllAsReadService;
use OnlyFansAPI\Services\Chats\MessagesService;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ChatsService implements ChatsContract
{
    /**
     * @api
     */
    public ChatsRawService $raw;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @api
     */
    public MarkAllAsReadService $markAllAsRead;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChatsRawService($client);
        $this->messages = new MessagesService($client);
        $this->markAllAsRead = new MarkAllAsReadService($client);
    }

    /**
     * @api
     *
     * Get the list of chats for an Account.
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
    ): ChatListResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'order' => $order,
                'query' => $query,
                'skipUsers' => $skipUsers,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific chat.
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
    ): ChatDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Hide a specific chat from the chat list. To unhide this chat, send a new message to the user.
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
    ): ChatHideResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->hide($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List media files shared in a specific chat.
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
    ): ChatListMediaResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'limit' => $limit,
                'offset' => $offset,
                'skipUsers' => $skipUsers,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listMedia($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a specific chat as read. Alternative to List Chat Messages endpoint, if you just want to mark the chat as read without fetching messages.
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
    ): ChatMarkAsReadResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->markAsRead($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a specific chat as unread.
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
    ): ChatMarkAsUnreadResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->markAsUnread($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mute notifications for a specific chat.
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
    ): ChatMuteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->mute($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Calling this endpoint will show the target fan a "Model is typing..." note in the chat for ~4 seconds. Duplicate calls for the same account and chat are coalesced during that window.
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
    ): ChatStartTypingResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startTyping($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unmute notifications for a specific chat.
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
    ): ChatUnmuteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unmute($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
