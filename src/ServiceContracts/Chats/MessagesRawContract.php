<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Chats;

use OnlyFansAPI\Chats\Messages\MessageDeleteParams;
use OnlyFansAPI\Chats\Messages\MessageDeleteResponse;
use OnlyFansAPI\Chats\Messages\MessageGetResponse;
use OnlyFansAPI\Chats\Messages\MessageLikeParams;
use OnlyFansAPI\Chats\Messages\MessageLikeResponse;
use OnlyFansAPI\Chats\Messages\MessageListParams;
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
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MessagesRawContract
{
    /**
     * @api
     *
     * @param string $messageID The ID of the message to retrieve
     * @param array<string,mixed>|MessageRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array<string,mixed>|MessageListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID The ID of the message to retrieve
     * @param array<string,mixed>|MessageDeleteParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID The ID of the message to like
     * @param array<string,mixed>|MessageLikeParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID The ID of the message to pin
     * @param array<string,mixed>|MessagePinParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array<string,mixed>|MessageSearchParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $chatID Path param: The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array<string,mixed>|MessageSendParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID The ID of the message to unlike
     * @param array<string,mixed>|MessageUnlikeParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID The ID of the message to unpin
     * @param array<string,mixed>|MessageUnpinParams $params
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
    ): BaseResponse;
}
