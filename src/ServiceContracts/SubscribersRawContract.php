<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Subscribers\SubscriberGetStatisticsResponse;
use OnlyFansAPI\Subscribers\SubscriberRetrieveStatisticsParams;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SubscribersRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SubscriberRetrieveStatisticsParams $params
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
    ): BaseResponse;
}
