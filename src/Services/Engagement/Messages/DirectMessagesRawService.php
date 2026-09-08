<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Engagement\Messages;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartParams;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartResponse;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageListParams;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageListResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Engagement\Messages\DirectMessagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class DirectMessagesRawService implements DirectMessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List sent direct messages with engagement stats (sent, viewed, purchased, etc.).
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string,
     *   limit?: int,
     *   offset?: int,
     *   query?: string,
     *   startDate?: string,
     * }|DirectMessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirectMessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|DirectMessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirectMessageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/engagement/messages/direct-messages', $account],
            query: $parsed,
            options: $options,
            convert: DirectMessageListResponse::class,
        );
    }

    /**
     * @api
     *
     * Get engagement chart metrics for direct messages: sent count and purchase amount over time.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string, startDate?: string, withTotal?: bool
     * }|DirectMessageChartParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirectMessageChartResponse>
     *
     * @throws APIException
     */
    public function chart(
        string $account,
        array|DirectMessageChartParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirectMessageChartParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/engagement/messages/direct-messages/chart', $account],
            query: $parsed,
            options: $options,
            convert: DirectMessageChartResponse::class,
        );
    }
}
