<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Chats\ChatDeleteParams;
use Onlyfansapi\Chats\ChatDeleteResponse;
use Onlyfansapi\Chats\ChatHideParams;
use Onlyfansapi\Chats\ChatHideResponse;
use Onlyfansapi\Chats\ChatListMediaParams;
use Onlyfansapi\Chats\ChatListMediaResponse;
use Onlyfansapi\Chats\ChatListParams;
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
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface ChatsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ChatListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to delete, usually a fan's OnlyFans User ID
     * @param array<string,mixed>|ChatDeleteParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to hide, usually a fan's OnlyFans User ID
     * @param array<string,mixed>|ChatHideParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID Path param: The ID of the chat to get media from, usually a fan's OnlyFans User ID
     * @param array<string,mixed>|ChatListMediaParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to mark as read, usually a fan's OnlyFans User ID
     * @param array<string,mixed>|ChatMarkAsReadParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to mark as read, usually a fan's OnlyFans User ID
     * @param array<string,mixed>|ChatMarkAsUnreadParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to mute, usually a fan's OnlyFans User ID
     * @param array<string,mixed>|ChatMuteParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array<string,mixed>|ChatStartTypingParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID The ID of the chat to unmute, usually a fan's OnlyFans User ID
     * @param array<string,mixed>|ChatUnmuteParams $params
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
    ): BaseResponse;
}
