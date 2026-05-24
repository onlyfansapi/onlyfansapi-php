<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Subscribers\SubscriberGetStatisticsResponse;
use Onlyfansapi\Subscribers\SubscriberRetrieveStatisticsParams;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
