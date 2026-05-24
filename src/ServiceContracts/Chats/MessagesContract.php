<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Chats;

use Onlyfansapi\Chats\Messages\MessageDeleteResponse;
use Onlyfansapi\Chats\Messages\MessageGetResponse;
use Onlyfansapi\Chats\Messages\MessageLikeResponse;
use Onlyfansapi\Chats\Messages\MessageListParams\Filter;
use Onlyfansapi\Chats\Messages\MessageListResponse;
use Onlyfansapi\Chats\Messages\MessagePinResponse;
use Onlyfansapi\Chats\Messages\MessageSearchResponse;
use Onlyfansapi\Chats\Messages\MessageSendResponse;
use Onlyfansapi\Chats\Messages\MessageUnlikeResponse;
use Onlyfansapi\Chats\Messages\MessageUnpinResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface MessagesContract
{
    /**
     * @api
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
    ): MessageGetResponse;

    /**
     * @api
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account Path param: The Account ID
     * @param Filter|value-of<Filter> $filter Query param: Filter by certain messages. Currently, only pins are filterable.
     * @param string|null $firstID Query param: Use for pagination when `order=desc` (newest to oldest). Include this message ID as the first message in the results. Used to retrieve messages from e.g. the Search Chat Messages endpoint IDs.
     * @param string|null $lastID Query param: Use for pagination when `order=asc` (oldest to newest). Include this message ID as the first message in the results. WARNING! The response list of messages will also be inverted (oldest messages will be first, opposite to default where `order=desc`).
     * @param string $limit Query param: The number of messages to return (default = 10, max = 100)
     * @param string $order Query param: Sort order for messages (desc or asc)
     * @param string $skipUsers Query param: Whether to skip user details (all or none)
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
    ): MessageListResponse;

    /**
     * @api
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
    ): MessageDeleteResponse;

    /**
     * @api
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
    ): MessageLikeResponse;

    /**
     * @api
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
    ): MessagePinResponse;

    /**
     * @api
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account Path param: The Account ID
     * @param string $query Query param: The query search in messages
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        string $chatID,
        string $account,
        string $query,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSearchResponse;

    /**
     * @api
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
    ): MessageSendResponse;

    /**
     * @api
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
    ): MessageUnlikeResponse;

    /**
     * @api
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
    ): MessageUnpinResponse;
}
