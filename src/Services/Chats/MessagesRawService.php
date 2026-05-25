<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Chats;

use OnlyFansAPI\Chats\Messages\MessageDeleteParams;
use OnlyFansAPI\Chats\Messages\MessageDeleteResponse;
use OnlyFansAPI\Chats\Messages\MessageGetResponse;
use OnlyFansAPI\Chats\Messages\MessageLikeParams;
use OnlyFansAPI\Chats\Messages\MessageLikeResponse;
use OnlyFansAPI\Chats\Messages\MessageListParams;
use OnlyFansAPI\Chats\Messages\MessageListParams\Filter;
use OnlyFansAPI\Chats\Messages\MessageListResponse;
use OnlyFansAPI\Chats\Messages\MessagePinParams;
use OnlyFansAPI\Chats\Messages\MessagePinResponse;
use OnlyFansAPI\Chats\Messages\MessageRetrieveParams;
use OnlyFansAPI\Chats\Messages\MessageSearchParams;
use OnlyFansAPI\Chats\Messages\MessageSearchResponse;
use OnlyFansAPI\Chats\Messages\MessageSendParams;
use OnlyFansAPI\Chats\Messages\MessageSendResponse;
use OnlyFansAPI\Chats\Messages\MessageUnlikeParams;
use OnlyFansAPI\Chats\Messages\MessageUnlikeResponse;
use OnlyFansAPI\Chats\Messages\MessageUnpinParams;
use OnlyFansAPI\Chats\Messages\MessageUnpinResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Chats\MessagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class MessagesRawService implements MessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a single chat message by its ID. Returns a 404 if the message does not exist in the chat.
     *
     * @param string $messageID The ID of the message to retrieve
     * @param array{account: string, chatID: string}|MessageRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $messageID,
        array|MessageRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $chatID = $parsed['chatID'];
        unset($parsed['chatID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'api/%1$s/chats/%2$s/messages/%3$s', $account, $chatID, $messageID,
            ],
            options: $options,
            convert: MessageGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get messages from a specific chat.
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array{
     *   account: string,
     *   filter?: Filter|value-of<Filter>,
     *   firstID?: string|null,
     *   lastID?: string|null,
     *   limit?: string,
     *   order?: string,
     *   skipUsers?: string,
     * }|MessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $chatID,
        array|MessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/chats/%2$s/messages', $account, $chatID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'firstID' => 'first_id',
                    'lastID' => 'last_id',
                    'skipUsers' => 'skip_users',
                ],
            ),
            options: $options,
            convert: MessageListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a message from a chat. Please note that ONLY messages sent less than 24 hours ago can be deleted.
     *
     * @param string $messageID The ID of the message to retrieve
     * @param array{account: string, chatID: string}|MessageDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $messageID,
        array|MessageDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $chatID = $parsed['chatID'];
        unset($parsed['chatID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/chats/%2$s/messages/%3$s', $account, $chatID, $messageID,
            ],
            options: $options,
            convert: MessageDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Like a chat message.
     *
     * @param string $messageID The ID of the message to like
     * @param array{account: string, chatID: string}|MessageLikeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageLikeResponse>
     *
     * @throws APIException
     */
    public function like(
        string $messageID,
        array|MessageLikeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageLikeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $chatID = $parsed['chatID'];
        unset($parsed['chatID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'api/%1$s/chats/%2$s/messages/%3$s/like', $account, $chatID, $messageID,
            ],
            options: $options,
            convert: MessageLikeResponse::class,
        );
    }

    /**
     * @api
     *
     * Pin a message from a chat.
     *
     * @param string $messageID The ID of the message to pin
     * @param array{account: string, chatID: string}|MessagePinParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagePinResponse>
     *
     * @throws APIException
     */
    public function pin(
        string $messageID,
        array|MessagePinParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagePinParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $chatID = $parsed['chatID'];
        unset($parsed['chatID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'api/%1$s/chats/%2$s/messages/%3$s/pin', $account, $chatID, $messageID,
            ],
            options: $options,
            convert: MessagePinResponse::class,
        );
    }

    /**
     * @api
     *
     * Search messages in a specific chat. Returns a list of message IDs matching the search query.
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array{account: string, query: string}|MessageSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSearchResponse>
     *
     * @throws APIException
     */
    public function search(
        string $chatID,
        array|MessageSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageSearchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/chats/%2$s/messages/search', $account, $chatID],
            query: $parsed,
            options: $options,
            convert: MessageSearchResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a new message to a chat.
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array{
     *   account: string,
     *   giphyID?: string,
     *   lockedText?: bool,
     *   mediaFiles?: list<mixed>,
     *   previews?: list<mixed>,
     *   price?: int,
     *   replyToMessageID?: int,
     *   rfGuest?: string,
     *   rfPartner?: string,
     *   rfTag?: string,
     *   text?: string,
     * }|MessageSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendResponse>
     *
     * @throws APIException
     */
    public function send(
        string $chatID,
        array|MessageSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageSendParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/chats/%2$s/messages', $account, $chatID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: MessageSendResponse::class,
        );
    }

    /**
     * @api
     *
     * Unlike a chat message.
     *
     * @param string $messageID The ID of the message to unlike
     * @param array{account: string, chatID: string}|MessageUnlikeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageUnlikeResponse>
     *
     * @throws APIException
     */
    public function unlike(
        string $messageID,
        array|MessageUnlikeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageUnlikeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $chatID = $parsed['chatID'];
        unset($parsed['chatID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/chats/%2$s/messages/%3$s/unlike',
                $account,
                $chatID,
                $messageID,
            ],
            options: $options,
            convert: MessageUnlikeResponse::class,
        );
    }

    /**
     * @api
     *
     * Unpin a message from a chat.
     *
     * @param string $messageID The ID of the message to unpin
     * @param array{account: string, chatID: string}|MessageUnpinParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageUnpinResponse>
     *
     * @throws APIException
     */
    public function unpin(
        string $messageID,
        array|MessageUnpinParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageUnpinParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $chatID = $parsed['chatID'];
        unset($parsed['chatID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/chats/%2$s/messages/%3$s/unpin', $account, $chatID, $messageID,
            ],
            options: $options,
            convert: MessageUnpinResponse::class,
        );
    }
}
