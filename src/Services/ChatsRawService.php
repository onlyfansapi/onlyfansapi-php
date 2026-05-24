<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Chats\ChatDeleteParams;
use Onlyfansapi\Chats\ChatDeleteResponse;
use Onlyfansapi\Chats\ChatHideParams;
use Onlyfansapi\Chats\ChatHideResponse;
use Onlyfansapi\Chats\ChatListMediaParams;
use Onlyfansapi\Chats\ChatListMediaParams\Type;
use Onlyfansapi\Chats\ChatListMediaResponse;
use Onlyfansapi\Chats\ChatListParams;
use Onlyfansapi\Chats\ChatListParams\Filter;
use Onlyfansapi\Chats\ChatListParams\Order;
use Onlyfansapi\Chats\ChatListParams\SkipUsers;
use Onlyfansapi\Chats\ChatListResponse;
use Onlyfansapi\Chats\ChatMarkAsReadParams;
use Onlyfansapi\Chats\ChatMarkAsReadResponse;
use Onlyfansapi\Chats\ChatMarkAsUnreadParams;
use Onlyfansapi\Chats\ChatMarkAsUnreadResponse;
use Onlyfansapi\Chats\ChatMuteParams;
use Onlyfansapi\Chats\ChatMuteResponse;
use Onlyfansapi\Chats\ChatStartTypingParams;
use Onlyfansapi\Chats\ChatStartTypingResponse;
use Onlyfansapi\Chats\ChatUnmuteParams;
use Onlyfansapi\Chats\ChatUnmuteResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ChatsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class ChatsRawService implements ChatsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of chats for an Account.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: Filter|value-of<Filter>,
     *   limit?: string,
     *   offset?: string,
     *   order?: Order|value-of<Order>,
     *   query?: string,
     *   skipUsers?: SkipUsers|value-of<SkipUsers>,
     * }|ChatListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|ChatListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/chats', $account],
            query: Util::array_transform_keys($parsed, ['skipUsers' => 'skip_users']),
            options: $options,
            convert: ChatListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific chat.
     *
     * @param string $chatID The ID of the chat to delete, usually a fan's OnlyFans User ID
     * @param array{account: string}|ChatDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $chatID,
        array|ChatDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/chats/%2$s', $account, $chatID],
            options: $options,
            convert: ChatDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Hide a specific chat from the chat list. To unhide this chat, send a new message to the user.
     *
     * @param string $chatID The ID of the chat to hide, usually a fan's OnlyFans User ID
     * @param array{account: string}|ChatHideParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatHideResponse>
     *
     * @throws APIException
     */
    public function hide(
        string $chatID,
        array|ChatHideParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatHideParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/chats/%2$s/hide', $account, $chatID],
            options: $options,
            convert: ChatHideResponse::class,
        );
    }

    /**
     * @api
     *
     * List media files shared in a specific chat.
     *
     * @param string $chatID Path param: The ID of the chat to get media from, usually a fan's OnlyFans User ID
     * @param array{
     *   account: string,
     *   limit?: string,
     *   offset?: string,
     *   skipUsers?: string,
     *   type?: Type|value-of<Type>|null,
     * }|ChatListMediaParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatListMediaResponse>
     *
     * @throws APIException
     */
    public function listMedia(
        string $chatID,
        array|ChatListMediaParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatListMediaParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/chats/%2$s/media', $account, $chatID],
            query: Util::array_transform_keys($parsed, ['skipUsers' => 'skip_users']),
            options: $options,
            convert: ChatListMediaResponse::class,
        );
    }

    /**
     * @api
     *
     * Mark a specific chat as read. Alternative to List Chat Messages endpoint, if you just want to mark the chat as read without fetching messages.
     *
     * @param string $chatID The ID of the chat to mark as read, usually a fan's OnlyFans User ID
     * @param array{account: string}|ChatMarkAsReadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatMarkAsReadResponse>
     *
     * @throws APIException
     */
    public function markAsRead(
        string $chatID,
        array|ChatMarkAsReadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatMarkAsReadParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/chats/%2$s/mark-as-read', $account, $chatID],
            options: $options,
            convert: ChatMarkAsReadResponse::class,
        );
    }

    /**
     * @api
     *
     * Mark a specific chat as unread.
     *
     * @param string $chatID The ID of the chat to mark as read, usually a fan's OnlyFans User ID
     * @param array{account: string}|ChatMarkAsUnreadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatMarkAsUnreadResponse>
     *
     * @throws APIException
     */
    public function markAsUnread(
        string $chatID,
        array|ChatMarkAsUnreadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatMarkAsUnreadParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/chats/%2$s/mark-as-unread', $account, $chatID],
            options: $options,
            convert: ChatMarkAsUnreadResponse::class,
        );
    }

    /**
     * @api
     *
     * Mute notifications for a specific chat.
     *
     * @param string $chatID The ID of the chat to mute, usually a fan's OnlyFans User ID
     * @param array{account: string}|ChatMuteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatMuteResponse>
     *
     * @throws APIException
     */
    public function mute(
        string $chatID,
        array|ChatMuteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatMuteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/chats/%2$s/mute', $account, $chatID],
            options: $options,
            convert: ChatMuteResponse::class,
        );
    }

    /**
     * @api
     *
     * Calling this endpoint will show the target fan a "Model is typing..." note in the chat for ~4 seconds. If you want to continue showing the indicator call this endpoint multiple times. Free - no credits charged.
     *
     * @param string $chatID The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array{account: string}|ChatStartTypingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatStartTypingResponse>
     *
     * @throws APIException
     */
    public function startTyping(
        string $chatID,
        array|ChatStartTypingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatStartTypingParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/chats/%2$s/typing', $account, $chatID],
            options: $options,
            convert: ChatStartTypingResponse::class,
        );
    }

    /**
     * @api
     *
     * Unmute notifications for a specific chat.
     *
     * @param string $chatID The ID of the chat to unmute, usually a fan's OnlyFans User ID
     * @param array{account: string}|ChatUnmuteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatUnmuteResponse>
     *
     * @throws APIException
     */
    public function unmute(
        string $chatID,
        array|ChatUnmuteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatUnmuteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/chats/%2$s/unmute', $account, $chatID],
            options: $options,
            convert: ChatUnmuteResponse::class,
        );
    }
}
