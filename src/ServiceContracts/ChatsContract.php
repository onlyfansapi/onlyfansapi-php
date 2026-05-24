<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

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
     * @param string $limit Number of chats to return (10, 20, or 30)
     * @param string $offset Number of chats to skip for pagination
     * @param string $order Sort order for chats (recent or old)
     * @param string $query Search query to filter chats
     * @param string $skipUsers Whether to skip user details in response (all or none)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?string $limit = null,
        ?string $offset = null,
        ?string $order = null,
        ?string $query = null,
        ?string $skipUsers = null,
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
