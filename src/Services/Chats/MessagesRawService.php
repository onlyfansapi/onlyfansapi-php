<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Chats;

use Onlyfansapi\Chats\Messages\MessageDeleteParams;
use Onlyfansapi\Chats\Messages\MessageDeleteResponse;
use Onlyfansapi\Chats\Messages\MessageListParams;
use Onlyfansapi\Chats\Messages\MessageListParams\Filter;
use Onlyfansapi\Chats\Messages\MessageListResponse;
use Onlyfansapi\Chats\Messages\MessageSendParams;
use Onlyfansapi\Chats\Messages\MessageSendResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Chats\MessagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
}
