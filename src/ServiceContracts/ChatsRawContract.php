<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Chats\ChatDeleteParams;
use OnlyFansAPI\Chats\ChatDeleteResponse;
use OnlyFansAPI\Chats\ChatHideParams;
use OnlyFansAPI\Chats\ChatHideResponse;
use OnlyFansAPI\Chats\ChatListMediaParams;
use OnlyFansAPI\Chats\ChatListMediaResponse;
use OnlyFansAPI\Chats\ChatListParams;
use OnlyFansAPI\Chats\ChatListResponse;
use OnlyFansAPI\Chats\ChatMarkAsReadParams;
use OnlyFansAPI\Chats\ChatMarkAsReadResponse;
use OnlyFansAPI\Chats\ChatMarkAsUnreadParams;
use OnlyFansAPI\Chats\ChatMarkAsUnreadResponse;
use OnlyFansAPI\Chats\ChatMuteParams;
use OnlyFansAPI\Chats\ChatMuteResponse;
use OnlyFansAPI\Chats\ChatStartTypingParams;
use OnlyFansAPI\Chats\ChatStartTypingResponse;
use OnlyFansAPI\Chats\ChatUnmuteParams;
use OnlyFansAPI\Chats\ChatUnmuteResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
