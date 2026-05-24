<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Engagement\Messages;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartParams;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageListParams;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageListResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Engagement\Messages\MassMessagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class MassMessagesRawService implements MassMessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List sent mass messages with engagement stats (sent, viewed, purchased, etc.).
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string, limit?: int, query?: string, startDate?: string
     * }|MassMessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|MassMessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MassMessageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/engagement/messages/mass-messages', $account],
            query: $parsed,
            options: $options,
            convert: MassMessageListResponse::class,
        );
    }

    /**
     * @api
     *
     * Get engagement chart metrics for mass messages: sent count and purchase amount over time.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string, startDate?: string, withTotal?: bool
     * }|MassMessageChartParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessageChartResponse>
     *
     * @throws APIException
     */
    public function chart(
        string $account,
        array|MassMessageChartParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MassMessageChartParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/engagement/messages/mass-messages/chart', $account],
            query: $parsed,
            options: $options,
            convert: MassMessageChartResponse::class,
        );
    }
}
