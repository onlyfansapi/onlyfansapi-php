<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Chats\ChatListResponse;
use Onlyfansapi\Chats\ChatStartTypingIndicatorResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ChatsContract;
use Onlyfansapi\Services\Chats\MessagesService;

/**
 * APIs for managing OnlyFans chats.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChatsRawService($client);
        $this->messages = new MessagesService($client);
    }

    /**
     * @api
     *
     * Get the list of chats for an Account.
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
    ): ChatListResponse {
        $params = Util::removeNulls(
            [
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
     * Calling this endpoint will show the target fan a "Model is typing..." note in the chat for ~4 seconds. If you want to continue showing the indicator call this endpoint multiple times. Free - no credits charged.
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
    ): ChatStartTypingIndicatorResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startTypingIndicator($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
