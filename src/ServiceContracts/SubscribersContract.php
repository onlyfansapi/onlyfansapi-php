<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Subscribers\SubscriberGetStatisticsResponse;
use OnlyFansAPI\Subscribers\SubscriberRetrieveStatisticsParams\Type;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SubscribersContract
{
    /**
     * @api
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
    ): SubscriberGetStatisticsResponse;
}
