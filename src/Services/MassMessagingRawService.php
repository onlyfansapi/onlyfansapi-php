<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\MassMessaging\MassMessagingDeleteParams;
use OnlyFansAPI\MassMessaging\MassMessagingDeleteResponse;
use OnlyFansAPI\MassMessaging\MassMessagingGetOverviewResponse;
use OnlyFansAPI\MassMessaging\MassMessagingGetResponse;
use OnlyFansAPI\MassMessaging\MassMessagingListResponse;
use OnlyFansAPI\MassMessaging\MassMessagingRetrieveOverviewParams;
use OnlyFansAPI\MassMessaging\MassMessagingRetrieveParams;
use OnlyFansAPI\MassMessaging\MassMessagingSendParams;
use OnlyFansAPI\MassMessaging\MassMessagingSendResponse;
use OnlyFansAPI\MassMessaging\MassMessagingUpdateParams;
use OnlyFansAPI\MassMessaging\MassMessagingUpdateParams\BlockBannedWords;
use OnlyFansAPI\MassMessaging\MassMessagingUpdateResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\MassMessagingRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class MassMessagingRawService implements MassMessagingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the content and settings of a mass message, including a message scheduled for later.
     *
     * @param string $id The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param array{account: string}|MassMessagingRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|MassMessagingRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MassMessagingRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/mass-messaging/%2$s', $account, $id],
            options: $options,
            convert: MassMessagingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the content, recipients, media, price, or scheduled send time of an existing mass message.
     *
     * @param string $id Path param: The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param array{
     *   account: string,
     *   text: string,
     *   blockBannedWords?: BlockBannedWords|value-of<BlockBannedWords>,
     *   giphyID?: string,
     *   lockedText?: bool,
     *   mediaFiles?: list<string>,
     *   previews?: list<string>,
     *   price?: float,
     *   scheduledDate?: string,
     *   userIDs?: list<string>,
     *   userLists?: list<string>,
     * }|MassMessagingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MassMessagingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MassMessagingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/mass-messaging/%2$s', $account, $id],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: MassMessagingUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List pending, scheduled, and recently sent mass messages. Use an item ID to retrieve, update, reschedule, delete, or unsend the message.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/mass-messaging', $account],
            options: $requestOptions,
            convert: MassMessagingListResponse::class,
        );
    }

    /**
     * @api
     *
     * Unsend a recently sent mass message, or delete a scheduled/saved message. When unsending, purchased content will continue to be able to viewable.
     *
     * @param string $id The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param array{account: string}|MassMessagingDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|MassMessagingDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MassMessagingDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/mass-messaging/%2$s', $account, $id],
            options: $options,
            convert: MassMessagingDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an overview of mass messages, showing the send count and view count.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string, limit?: int, query?: string, startDate?: string
     * }|MassMessagingRetrieveOverviewParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingGetOverviewResponse>
     *
     * @throws APIException
     */
    public function retrieveOverview(
        string $account,
        array|MassMessagingRetrieveOverviewParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MassMessagingRetrieveOverviewParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/mass-messaging/overview', $account],
            query: $parsed,
            options: $options,
            convert: MassMessagingGetOverviewResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a mass message to lists and/or users. You may use both the `userLists` and `userIds` parameters to send the same message to both lists and individual users.
     *
     * @param string $account The Account ID
     * @param array{
     *   text: string,
     *   blockBannedWords?: MassMessagingSendParams\BlockBannedWords|value-of<MassMessagingSendParams\BlockBannedWords>,
     *   excludedLists?: list<string>,
     *   giphyID?: string,
     *   lockedText?: bool,
     *   mediaFiles?: list<mixed>,
     *   previews?: list<mixed>,
     *   price?: float,
     *   rfGuest?: string,
     *   rfPartner?: string,
     *   rfTag?: string,
     *   saveForLater?: bool,
     *   scheduledDate?: string,
     *   subscribedWithinLastDays?: int,
     *   userIDs?: list<string>,
     *   userLists?: list<string>,
     * }|MassMessagingSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingSendResponse>
     *
     * @throws APIException
     */
    public function send(
        string $account,
        array|MassMessagingSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MassMessagingSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/mass-messaging', $account],
            body: (object) $parsed,
            options: $options,
            convert: MassMessagingSendResponse::class,
        );
    }
}
