<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Chats;

use Onlyfansapi\Chats\Messages\MessageDeleteResponse;
use Onlyfansapi\Chats\Messages\MessageListResponse;
use Onlyfansapi\Chats\Messages\MessageSendResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Chats\MessagesContract;

/**
 * APIs for managing OnlyFans chats.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class MessagesService implements MessagesContract
{
    /**
     * @api
     */
    public MessagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
    }

    /**
     * @api
     *
     * Get messages from a specific chat.
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account Path param: The Account ID
     * @param string $id Query param: ID of the last message from previous page. Used for pagination
     * @param string $order Query param: Sort order for messages (desc or asc)
     * @param string $skipUsers Query param: Whether to skip user details (all or none)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $chatID,
        string $account,
        ?string $id = null,
        ?string $order = null,
        ?string $skipUsers = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageListResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'id' => $id,
                'order' => $order,
                'skipUsers' => $skipUsers,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a message from a chat. Please note that ONLY messages sent less than 24 hours ago can be deleted.
     *
     * @param string $messageID The ID of the message to delete
     * @param string $account The Account ID
     * @param string $chatID The ID of the chat, usually a fan's OnlyFans User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $messageID,
        string $account,
        string $chatID,
        RequestOptions|array|null $requestOptions = null,
    ): MessageDeleteResponse {
        $params = Util::removeNulls(['account' => $account, 'chatID' => $chatID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send a new message to a chat.
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account Path param: The Account ID
     * @param string $text Body param: The message text content
     * @param bool $lockedText Body param: Whether the text should be shown or hidden
     * @param list<string> $mediaFiles Body param: Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be hidden if `price` is provided.
     * @param list<string> $previews Body param: Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be shown if `price` is provided. All `previews` values must also exist in the `mediaFiles` array.
     * @param int $price Body param: Price for paid content (0 or between 3-200). In case this is not zero, **mediaFiles** is required
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $chatID,
        string $account,
        string $text,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'text' => $text,
                'lockedText' => $lockedText,
                'mediaFiles' => $mediaFiles,
                'previews' => $previews,
                'price' => $price,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
