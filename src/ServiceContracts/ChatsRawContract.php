<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Chats\ChatListParams;
use Onlyfansapi\Chats\ChatListResponse;
use Onlyfansapi\Chats\ChatStartTypingIndicatorParams;
use Onlyfansapi\Chats\ChatStartTypingIndicatorResponse;
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
     * @param string $chatID The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array<string,mixed>|ChatStartTypingIndicatorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatStartTypingIndicatorResponse>
     *
     * @throws APIException
     */
    public function startTypingIndicator(
        string $chatID,
        array|ChatStartTypingIndicatorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
