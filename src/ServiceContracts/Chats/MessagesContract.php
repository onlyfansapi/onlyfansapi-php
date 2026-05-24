<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Chats;

use Onlyfansapi\Chats\Messages\MessageDeleteResponse;
use Onlyfansapi\Chats\Messages\MessageListResponse;
use Onlyfansapi\Chats\Messages\MessageSendResponse;
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
    ): MessageListResponse;

    /**
     * @api
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
    ): MessageDeleteResponse;

    /**
     * @api
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
    ): MessageSendResponse;
}
