<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Users;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Users\Subscribe\SubscribeDeleteResponse;
use OnlyFansAPI\Users\Subscribe\SubscribeNewResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SubscribeContract
{
    /**
     * @api
     *
     * @param string $userID the OnlyFans ID of the user to subscribe to
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): SubscribeNewResponse;

    /**
     * @api
     *
     * @param string $userID path param: The OnlyFans ID of the user to subscribe to
     * @param string $account Path param: The Account ID
     * @param string $reason Body param: Reason for unsubscribing. Valid options: `1,2,3,4,5`. Leave empty for `No specific reason`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $userID,
        string $account,
        string $reason,
        RequestOptions|array|null $requestOptions = null,
    ): SubscribeDeleteResponse;
}
