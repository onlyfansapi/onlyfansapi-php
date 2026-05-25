<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\SubscribersRawContract;
use OnlyFansAPI\Subscribers\SubscriberGetStatisticsResponse;
use OnlyFansAPI\Subscribers\SubscriberRetrieveStatisticsParams;
use OnlyFansAPI\Subscribers\SubscriberRetrieveStatisticsParams\Type;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SubscribersRawService implements SubscribersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get subscriber and earning statistics for an account for a specified timeframe. Optionally, filter by all, renews, or new subscribers.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string|null,
     *   startDate?: string|null,
     *   type?: Type|value-of<Type>|null,
     * }|SubscriberRetrieveStatisticsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriberGetStatisticsResponse>
     *
     * @throws APIException
     */
    public function retrieveStatistics(
        string $account,
        array|SubscriberRetrieveStatisticsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriberRetrieveStatisticsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/subscribers/statistics', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: SubscriberGetStatisticsResponse::class,
        );
    }
}
