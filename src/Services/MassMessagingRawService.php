<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\MassMessaging\MassMessagingDeleteParams;
use Onlyfansapi\MassMessaging\MassMessagingDeleteResponse;
use Onlyfansapi\MassMessaging\MassMessagingGetResponse;
use Onlyfansapi\MassMessaging\MassMessagingListQueueResponse;
use Onlyfansapi\MassMessaging\MassMessagingRetrieveParams;
use Onlyfansapi\MassMessaging\MassMessagingSendParams;
use Onlyfansapi\MassMessaging\MassMessagingSendResponse;
use Onlyfansapi\MassMessaging\MassMessagingUpdateParams;
use Onlyfansapi\MassMessaging\MassMessagingUpdateResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\MassMessagingRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * Get the content of a mass message.
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
     * Update a mass message.
     *
     * @param string $id Path param: The ID of the message queue item. Can be retrieved from the above store and list endpoints.
     * @param array{
     *   account: string,
     *   text: string,
     *   giphyID?: string,
     *   lockedText?: bool,
     *   mediaFiles?: list<string>,
     *   previews?: list<string>,
     *   price?: int,
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
     * List the pending or recently sent mass messages in the message queue.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessagingListQueueResponse>
     *
     * @throws APIException
     */
    public function listQueue(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/mass-messaging', $account],
            options: $requestOptions,
            convert: MassMessagingListQueueResponse::class,
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
     *   excludedLists?: list<string>,
     *   giphyID?: string,
     *   lockedText?: bool,
     *   mediaFiles?: list<mixed>,
     *   previews?: list<mixed>,
     *   price?: int,
     *   rfGuest?: string,
     *   rfPartner?: string,
     *   rfTag?: string,
     *   saveForLater?: bool,
     *   scheduledDate?: string,
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
