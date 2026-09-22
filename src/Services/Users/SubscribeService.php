<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Users;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Users\SubscribeContract;
use OnlyFansAPI\Users\Subscribe\SubscribeDeleteResponse;
use OnlyFansAPI\Users\Subscribe\SubscribeNewResponse;

/**
 * APIs for fetching OnlyFans users.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SubscribeService implements SubscribeContract
{
    /**
     * @api
     */
    public SubscribeRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubscribeRawService($client);
    }

    /**
     * @api
     *
     * Subscribe to a user's profile.
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
    ): SubscribeNewResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unsubscribe from a user's profile.
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
    ): SubscribeDeleteResponse {
        $params = Util::removeNulls(['account' => $account, 'reason' => $reason]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
