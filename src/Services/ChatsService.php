<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Chats\ChatListParams\Filter;
use Onlyfansapi\Chats\ChatListParams\Order;
use Onlyfansapi\Chats\ChatListParams\SkipUsers;
use Onlyfansapi\Chats\ChatListResponse;
use Onlyfansapi\Chats\ChatStartTypingIndicatorResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ChatsContract;
use Onlyfansapi\Services\Chats\MessagesService;

/**
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
