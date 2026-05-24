<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Engagement;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Engagement\Messages\MessageGetMessageBuyersParams;
use Onlyfansapi\Engagement\Messages\MessageGetMessageBuyersResponse;
use Onlyfansapi\Engagement\Messages\MessageGetTopMessageParams;
use Onlyfansapi\Engagement\Messages\MessageGetTopMessageResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Engagement\MessagesRawContract;

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
     * List buyers for a specific message.
     *
     * @param string $messageID path param: The ID of the message
     * @param array{
     *   account: string,
     *   limit?: int,
     *   marker?: int,
     *   offset?: int,
     *   skipUsers?: string,
     *   skipUsersDups?: int,
     * }|MessageGetMessageBuyersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageGetMessageBuyersResponse>
     *
     * @throws APIException
     */
    public function getMessageBuyers(
        string $messageID,
        array|MessageGetMessageBuyersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageGetMessageBuyersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/engagement/messages/%2$s/buyers', $account, $messageID],
            query: Util::array_transform_keys(
                $parsed,
                ['skipUsers' => 'skip_users', 'skipUsersDups' => 'skip_users_dups'],
            ),
            options: $options,
            convert: MessageGetMessageBuyersResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the top performing message by purchases in the selected timeframe.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string, startDate?: string
     * }|MessageGetTopMessageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageGetTopMessageResponse>
     *
     * @throws APIException
     */
    public function getTopMessage(
        string $account,
        array|MessageGetTopMessageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageGetTopMessageParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/engagement/messages/top-message', $account],
            query: $parsed,
            options: $options,
            convert: MessageGetTopMessageResponse::class,
        );
    }
}
