<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\MassMessaging\MassMessagingDeleteResponse;
use Onlyfansapi\MassMessaging\MassMessagingGetResponse;
use Onlyfansapi\MassMessaging\MassMessagingListQueueResponse;
use Onlyfansapi\MassMessaging\MassMessagingListStatisticsParams\Type;
use Onlyfansapi\MassMessaging\MassMessagingListStatisticsResponse;
use Onlyfansapi\MassMessaging\MassMessagingSendResponse;
use Onlyfansapi\MassMessaging\MassMessagingUpdateResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\MassMessagingContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class MassMessagingService implements MassMessagingContract
{
    /**
     * @api
     */
    public MassMessagingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MassMessagingRawService($client);
    }

    /**
     * @api
     *
     * Get the content of a mass message.
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
    ): MassMessagingGetResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a mass message.
     *
     * @param string $id Path param: The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param string $account Path param: The Account ID
     * @param string $text Body param: The message text content
     * @param bool $lockedText Body param: Whether the text should be shown or hidden
     * @param list<string> $mediaFiles Body param: Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be hidden if `price` is provided.
     * @param list<string> $previews Body param: Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be shown if `price` is provided. All `previews` values must also exist in the `mediaFiles` array.
     * @param int $price Body param: Price for paid content (0 or between 3-200). In case this is not zero, **mediaFiles** is required
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
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
        ?string $scheduledDate = null,
        ?array $userIDs = null,
        ?array $userLists = null,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessagingUpdateResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'text' => $text,
                'lockedText' => $lockedText,
                'mediaFiles' => $mediaFiles,
                'previews' => $previews,
                'price' => $price,
                'scheduledDate' => $scheduledDate,
                'userIDs' => $userIDs,
                'userLists' => $userLists,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unsend a recently sent mass message, or delete a scheduled/saved message. When unsending, purchased content will continue to be able to viewable.
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
    ): MassMessagingDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the pending or recently sent mass messages in the message queue.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listQueue(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): MassMessagingListQueueResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listQueue($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List mass messaging statistics, showing the send count and view count.
     *
     * @param string $account The Account ID
     * @param int $limit Number of mass messages to return (default = 20)
     * @param int $offset Number of mass messages to skip for pagination
     * @param string $query optionally, find a mass message by the message text
     * @param Type|value-of<Type> $type Filter by sent / scheduled / unsent (default = sent)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listStatistics(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessagingListStatisticsResponse {
        $params = Util::removeNulls(
            [
                'limit' => $limit,
                'offset' => $offset,
                'query' => $query,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listStatistics($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send a mass message to lists and/or users. You may use both the `userLists` and `userIds` parameters to send the same message to both lists and individual users.
     *
     * @param string $account The Account ID
     * @param string $text The message text content
     * @param bool $lockedText Whether the text should be shown or hidden
     * @param list<string> $mediaFiles Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be hidden if `price` is provided.
     * @param list<string> $previews Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be shown if `price` is provided. All `previews` values must also exist in the `mediaFiles` array.
     * @param int $price Price for paid content (0 or between 3-200). In case this is not zero, **mediaFiles** is required
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
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
        ?bool $saveForLater = null,
        ?string $scheduledDate = null,
        ?array $userIDs = null,
        ?array $userLists = null,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessagingSendResponse {
        $params = Util::removeNulls(
            [
                'text' => $text,
                'lockedText' => $lockedText,
                'mediaFiles' => $mediaFiles,
                'previews' => $previews,
                'price' => $price,
                'saveForLater' => $saveForLater,
                'scheduledDate' => $scheduledDate,
                'userIDs' => $userIDs,
                'userLists' => $userLists,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
