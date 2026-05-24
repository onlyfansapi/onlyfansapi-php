<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Chats;

use Onlyfansapi\Chats\Messages\MessageDeleteParams;
use Onlyfansapi\Chats\Messages\MessageDeleteResponse;
use Onlyfansapi\Chats\Messages\MessageGetResponse;
use Onlyfansapi\Chats\Messages\MessageLikeParams;
use Onlyfansapi\Chats\Messages\MessageLikeResponse;
use Onlyfansapi\Chats\Messages\MessageListParams;
use Onlyfansapi\Chats\Messages\MessageListResponse;
use Onlyfansapi\Chats\Messages\MessagePinParams;
use Onlyfansapi\Chats\Messages\MessagePinResponse;
use Onlyfansapi\Chats\Messages\MessageRetrieveParams;
use Onlyfansapi\Chats\Messages\MessageSearchParams;
use Onlyfansapi\Chats\Messages\MessageSearchResponse;
use Onlyfansapi\Chats\Messages\MessageSendParams;
use Onlyfansapi\Chats\Messages\MessageSendResponse;
use Onlyfansapi\Chats\Messages\MessageUnlikeParams;
use Onlyfansapi\Chats\Messages\MessageUnlikeResponse;
use Onlyfansapi\Chats\Messages\MessageUnpinParams;
use Onlyfansapi\Chats\Messages\MessageUnpinResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
