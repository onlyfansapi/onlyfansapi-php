<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Chats\ChatListParams;
use Onlyfansapi\Chats\ChatListResponse;
use Onlyfansapi\Chats\ChatStartTypingIndicatorParams;
use Onlyfansapi\Chats\ChatStartTypingIndicatorResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\ChatsRawContract;

/**
 * APIs for managing OnlyFans chats.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class ChatsRawService implements ChatsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of chats for an Account.
     *
     * @param string $account The Account ID
     * @param array{
     *   limit?: string,
     *   offset?: string,
     *   order?: string,
     *   query?: string,
     *   skipUsers?: string,
     * }|ChatListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|ChatListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/chats', $account],
            query: Util::array_transform_keys($parsed, ['skipUsers' => 'skip_users']),
            options: $options,
            convert: ChatListResponse::class,
        );
    }

    /**
     * @api
     *
     * Calling this endpoint will show the target fan a "Model is typing..." note in the chat for ~4 seconds. If you want to continue showing the indicator call this endpoint multiple times. Free - no credits charged.
     *
     * @param string $chatID The ID of the chat (usually a fan's OnlyFans User ID)
     * @param array{account: string}|ChatStartTypingIndicatorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChatStartTypingIndicatorResponse>
     *
     * @throws APIException
     */
    public function startTypingIndicator(
        string $chatID,
        array|ChatStartTypingIndicatorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatStartTypingIndicatorParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/chats/%2$s/typing', $account, $chatID],
            options: $options,
            convert: ChatStartTypingIndicatorResponse::class,
        );
    }
}
