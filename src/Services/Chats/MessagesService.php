<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Chats;

use OnlyFansAPI\Chats\Messages\MessageDeleteResponse;
use OnlyFansAPI\Chats\Messages\MessageGetResponse;
use OnlyFansAPI\Chats\Messages\MessageLikeResponse;
use OnlyFansAPI\Chats\Messages\MessageListParams\Filter;
use OnlyFansAPI\Chats\Messages\MessageListResponse;
use OnlyFansAPI\Chats\Messages\MessagePinResponse;
use OnlyFansAPI\Chats\Messages\MessageSearchResponse;
use OnlyFansAPI\Chats\Messages\MessageSendResponse;
use OnlyFansAPI\Chats\Messages\MessageUnlikeResponse;
use OnlyFansAPI\Chats\Messages\MessageUnpinResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Chats\MessagesContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     * Get a single chat message by its ID. Returns a 404 if the message does not exist in the chat.
     *
     * @param string $messageID The ID of the message to retrieve
     * @param string $account The Account ID
     * @param string $chatID The ID of the chat (usually a fan's OnlyFans User ID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $messageID,
        string $account,
        string $chatID,
        RequestOptions|array|null $requestOptions = null,
    ): MessageGetResponse {
        $params = Util::removeNulls(['account' => $account, 'chatID' => $chatID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get messages from a specific chat.
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account Path param: The Account ID
     * @param Filter|value-of<Filter> $filter Query param: Filter by certain messages. Currently, only pins are filterable.
     * @param string|null $firstID Query param: Use for pagination when `order=desc` (newest to oldest). Include this message ID as the first message in the results. Used to retrieve messages from e.g. the Search Chat Messages endpoint IDs.
     * @param string|null $lastID Query param: Use for pagination when `order=asc` (oldest to newest). Include this message ID as the first message in the results. WARNING! The response list of messages will also be inverted (oldest messages will be first, opposite to default where `order=desc`).
     * @param string $limit Query param: The number of messages to return (default = 10, max = 100)
     * @param string $order Query param: Sort order for messages (desc or asc)
     * @param string $skipUsers query param: Whether to skip user details (`all` or `none`)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $chatID,
        string $account,
        Filter|string|null $filter = null,
        ?string $firstID = null,
        ?string $lastID = null,
        ?string $limit = null,
        ?string $order = null,
        ?string $skipUsers = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageListResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'filter' => $filter,
                'firstID' => $firstID,
                'lastID' => $lastID,
                'limit' => $limit,
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
     * @param string $messageID The ID of the message to retrieve
     * @param string $account The Account ID
     * @param string $chatID The ID of the chat (usually a fan's OnlyFans User ID)
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
     * Like a chat message.
     *
     * @param string $messageID The ID of the message to like
     * @param string $account The Account ID
     * @param string $chatID The ID of the chat, usually a fan's OnlyFans User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function like(
        string $messageID,
        string $account,
        string $chatID,
        RequestOptions|array|null $requestOptions = null,
    ): MessageLikeResponse {
        $params = Util::removeNulls(['account' => $account, 'chatID' => $chatID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->like($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pin a message from a chat.
     *
     * @param string $messageID The ID of the message to pin
     * @param string $account The Account ID
     * @param string $chatID The ID of the chat, usually a fan's OnlyFans User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pin(
        string $messageID,
        string $account,
        string $chatID,
        RequestOptions|array|null $requestOptions = null,
    ): MessagePinResponse {
        $params = Util::removeNulls(['account' => $account, 'chatID' => $chatID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pin($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Search messages in a specific chat. Returns a list of message IDs matching the search query.
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account Path param: The Account ID
     * @param string $query query param: The query search in messages
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        string $chatID,
        string $account,
        string $query,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSearchResponse {
        $params = Util::removeNulls(['account' => $account, 'query' => $query]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send a new message to a chat.
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account Path param: The Account ID
     * @param string $giphyID Body param: The ID of the Giphy GIF to attach to the message. Get IDs from the Giphy listing endpoints (`/giphy/trending`, `/giphy/search`).
     * @param bool $lockedText Body param: Whether the text should be shown or hidden
     * @param list<mixed> $mediaFiles Body param: Direct file uploads, OFAPI `ofapi_media_` IDs, or OF vault IDs. Will be hidden if `price` is provided.
     * @param list<mixed> $previews Body param: Direct file uploads, OFAPI `ofapi_media_` IDs, OF vault IDs, or integer indices referencing uploaded files in `mediaFiles`. Will be shown if `price` is provided.
     * @param int $price Body param: Price for paid content (0 or between 3-200). In case this is not zero, **mediaFiles** is required
     * @param int $replyToMessageID Body param: Mark this message as a reply to another (can be either your own, or the recipient's)
     * @param string $rfGuest Body param: Array of OnlyFans Release Form Guest IDs to tag in your message
     * @param string $rfPartner Body param: Array of OnlyFans Release Form Partners IDs to tag in your message
     * @param string $rfTag Body param: Array of OnlyFans Creator User IDs to tag in your message
     * @param string $text Body param: The message text content. Required unless a media file is present.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $chatID,
        string $account,
        ?string $giphyID = null,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
        ?int $replyToMessageID = null,
        ?string $rfGuest = null,
        ?string $rfPartner = null,
        ?string $rfTag = null,
        ?string $text = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'giphyID' => $giphyID,
                'lockedText' => $lockedText,
                'mediaFiles' => $mediaFiles,
                'previews' => $previews,
                'price' => $price,
                'replyToMessageID' => $replyToMessageID,
                'rfGuest' => $rfGuest,
                'rfPartner' => $rfPartner,
                'rfTag' => $rfTag,
                'text' => $text,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send($chatID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unlike a chat message.
     *
     * @param string $messageID The ID of the message to unlike
     * @param string $account The Account ID
     * @param string $chatID The ID of the chat, usually a fan's OnlyFans User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unlike(
        string $messageID,
        string $account,
        string $chatID,
        RequestOptions|array|null $requestOptions = null,
    ): MessageUnlikeResponse {
        $params = Util::removeNulls(['account' => $account, 'chatID' => $chatID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unlike($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unpin a message from a chat.
     *
     * @param string $messageID The ID of the message to unpin
     * @param string $account The Account ID
     * @param string $chatID The ID of the chat, usually a fan's OnlyFans User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unpin(
        string $messageID,
        string $account,
        string $chatID,
        RequestOptions|array|null $requestOptions = null,
    ): MessageUnpinResponse {
        $params = Util::removeNulls(['account' => $account, 'chatID' => $chatID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unpin($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
