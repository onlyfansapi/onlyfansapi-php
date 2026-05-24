<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SubscribersContract;
use Onlyfansapi\Subscribers\SubscriberGetStatisticsResponse;
use Onlyfansapi\Subscribers\SubscriberRetrieveStatisticsParams\Type;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class SubscribersService implements SubscribersContract
{
    /**
     * @api
     */
    public SubscribersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubscribersRawService($client);
    }

    /**
     * @api
     *
     * Get subscriber and earning statistics for an account for a specified timeframe. Optionally, filter by all, renews, or new subscribers.
     *
     * @param string $account The Account ID
     * @param string|null $endDate The end date for the period. Keep empty to calculate everything.
     * @param string|null $startDate The start date for the period. Keep empty to calculate everything.
     * @param Type|value-of<Type>|null $type Filter the subscriber statistics (default = total)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStatistics(
        string $account,
        ?string $endDate = null,
        ?string $startDate = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriberGetStatisticsResponse {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate, 'type' => $type]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStatistics($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
