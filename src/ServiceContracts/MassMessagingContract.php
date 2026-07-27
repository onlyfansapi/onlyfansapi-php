<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\MassMessaging\MassMessagingDeleteResponse;
use OnlyFansAPI\MassMessaging\MassMessagingGetOverviewResponse;
use OnlyFansAPI\MassMessaging\MassMessagingGetResponse;
use OnlyFansAPI\MassMessaging\MassMessagingListResponse;
use OnlyFansAPI\MassMessaging\MassMessagingSendResponse;
use OnlyFansAPI\MassMessaging\MassMessagingUpdateParams\BlockBannedWords;
use OnlyFansAPI\MassMessaging\MassMessagingUpdateResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MassMessagingContract
{
    /**
     * @api
     *
     * @param string $id The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessagingGetResponse;

    /**
     * @api
     *
     * @param string $id Path param: The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param string $account Path param: The Account ID
     * @param string $text Body param: The message text content
     * @param BlockBannedWords|value-of<BlockBannedWords> $blockBannedWords Body param: Screen `text` for OnlyFans banned words and block the update if any are found (returns a 422 listing the offending words). `strict_ban` blocks all tiers, `risky` blocks Risky + Replace/soften, `replace_soften` blocks Replace/soften only. Omit to disable screening.
     * @param string $giphyID Body param: The ID of the Giphy GIF to attach to the message. Get IDs from the Giphy listing endpoints (`/giphy/trending`, `/giphy/search`).
     * @param bool $lockedText Body param: Whether the text should be shown or hidden
     * @param list<string> $mediaFiles Body param: Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be hidden if `price` is provided.
     * @param list<string> $previews Body param: Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be shown if `price` is provided. All `previews` values must also exist in the `mediaFiles` array.
     * @param float $price Body param: Price for paid content in USD (0 or between 3-200). In case this is not zero, **mediaFiles** is required
     * @param string $scheduledDate body param: Schedule the chat message in the future (UTC timezone)
     * @param list<string> $userIDs body param: Array of user IDs that the mass message will be sent to
     * @param list<string> $userLists body param: Array of user list IDs that the mass message will be sent to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $account,
        string $text,
        BlockBannedWords|string|null $blockBannedWords = null,
        ?string $giphyID = null,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?float $price = null,
        ?string $scheduledDate = null,
        ?array $userIDs = null,
        ?array $userLists = null,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessagingUpdateResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): MassMessagingListResponse;

    /**
     * @api
     *
     * @param string $id The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessagingDeleteResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate The latest mass message to retrieve. Keep empty to get all. It must be after `startDate` and is also used for pagination.
     * @param int $limit Number of mass messages to return (default = 10)
     * @param string $query optionally, find a mass message by the message text
     * @param string $startDate The earliest mass message to retrieve. Keep empty to get all.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveOverview(
        string $account,
        ?string $endDate = null,
        ?int $limit = null,
        ?string $query = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessagingGetOverviewResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $text The message text content
     * @param \OnlyFansAPI\MassMessaging\MassMessagingSendParams\BlockBannedWords|value-of<\OnlyFansAPI\MassMessaging\MassMessagingSendParams\BlockBannedWords> $blockBannedWords Screen `text` for OnlyFans banned words and block the send if any are found (returns a 422 listing the offending words). `strict_ban` blocks all tiers, `risky` blocks Risky + Replace/soften, `replace_soften` blocks Replace/soften only. Omit to disable screening.
     * @param list<string> $excludedLists array of user list IDs that the mass message will NOT be sent to
     * @param string $giphyID The ID of the Giphy GIF to attach to the message. Get IDs from the Giphy listing endpoints (`/giphy/trending`, `/giphy/search`).
     * @param bool $lockedText Whether the text should be shown or hidden
     * @param list<mixed> $mediaFiles Direct file uploads, OFAPI `ofapi_media_` IDs, or OF vault IDs. Will be hidden if `price` is provided.
     * @param list<mixed> $previews Direct file uploads, OFAPI `ofapi_media_` IDs, OF vault IDs, or integer indices referencing uploaded files in `mediaFiles`. Will be shown if `price` is provided.
     * @param float $price Price for paid content in USD (0 or between 3-200). In case this is not zero, **mediaFiles** is required
     * @param string $rfGuest Array of OnlyFans Release Form Guest IDs to tag in your mass message
     * @param string $rfPartner Array of OnlyFans Release Form Partners IDs to tag in your mass message
     * @param string $rfTag Array of OnlyFans Creator User IDs to tag in your mass message
     * @param bool $saveForLater add your message to the "Saved for later" queue
     * @param string $scheduledDate schedule the chat message in the future (UTC timezone)
     * @param list<string> $userIDs array of user IDs that the mass message will be sent to
     * @param list<string> $userLists array of user list IDs that the mass message will be sent to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $account,
        string $text,
        \OnlyFansAPI\MassMessaging\MassMessagingSendParams\BlockBannedWords|string|null $blockBannedWords = null,
        ?array $excludedLists = null,
        ?string $giphyID = null,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?float $price = null,
        ?string $rfGuest = null,
        ?string $rfPartner = null,
        ?string $rfTag = null,
        ?bool $saveForLater = null,
        ?string $scheduledDate = null,
        ?array $userIDs = null,
        ?array $userLists = null,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessagingSendResponse;
}
