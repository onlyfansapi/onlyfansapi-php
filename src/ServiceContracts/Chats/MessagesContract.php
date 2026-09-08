<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Chats;

use OnlyFansAPI\Chats\Messages\MessageDeleteResponse;
use OnlyFansAPI\Chats\Messages\MessageGetResponse;
use OnlyFansAPI\Chats\Messages\MessageLikeResponse;
use OnlyFansAPI\Chats\Messages\MessageListParams\Filter;
use OnlyFansAPI\Chats\Messages\MessageListResponse;
use OnlyFansAPI\Chats\Messages\MessagePinResponse;
use OnlyFansAPI\Chats\Messages\MessageSearchResponse;
use OnlyFansAPI\Chats\Messages\MessageSendParams\BlockBannedWords;
use OnlyFansAPI\Chats\Messages\MessageSendResponse;
use OnlyFansAPI\Chats\Messages\MessageUnlikeResponse;
use OnlyFansAPI\Chats\Messages\MessageUnpinResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
    ): MessageSearchResponse;

    /**
     * @api
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param string $account Path param: The Account ID
     * @param BlockBannedWords|value-of<BlockBannedWords> $blockBannedWords Body param: Screen `text` for OnlyFans banned words and block the send if any are found (returns a 422 listing the offending words). `strict_ban` blocks all tiers, `risky` blocks Risky + Replace/soften, `replace_soften` blocks Replace/soften only. Omit to disable screening.
     * @param string $giphyID Body param: The ID of the Giphy GIF to attach to the message. Get IDs from the Giphy listing endpoints (`/giphy/trending`, `/giphy/search`).
     * @param bool $lockedText Body param: Whether the text should be shown or hidden
     * @param list<mixed> $mediaFiles Body param: Direct file uploads, OFAPI `ofapi_media_` IDs, or OF vault IDs. Will be hidden if `price` is provided.
     * @param list<mixed> $previews Body param: Direct file uploads, OFAPI `ofapi_media_` IDs, OF vault IDs, or integer indices referencing uploaded files in `mediaFiles`. Will be shown if `price` is provided.
     * @param float $price Body param: Price for paid content in USD (0 or between 3-200). In case this is not zero, **mediaFiles** is required
     * @param int $replyToMessageID Body param: Mark this message as a reply to another (can be either your own, or the recipient's)
     * @param string $rfGuest Body param: Array of OnlyFans Release Form Guest IDs to tag in your message
     * @param string $rfPartner Body param: Array of OnlyFans Release Form Partners IDs to tag in your message
     * @param string $rfTag Body param: Array of OnlyFans Creator User IDs to tag in your message
     * @param string $text Body param: The message text content. Required unless a media file is present.
     * @param string $idempotencyKey Header param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $chatID,
        string $account,
        BlockBannedWords|string|null $blockBannedWords = null,
        ?string $giphyID = null,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?float $price = null,
        ?int $replyToMessageID = null,
        ?string $rfGuest = null,
        ?string $rfPartner = null,
        ?string $rfTag = null,
        ?string $text = null,
        ?string $idempotencyKey = null,
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
