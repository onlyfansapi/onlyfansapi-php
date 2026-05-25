<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\UsersContract;
use OnlyFansAPI\Services\Users\BlockService;
use OnlyFansAPI\Services\Users\RestrictService;
use OnlyFansAPI\Services\Users\SubscribeService;
use OnlyFansAPI\Users\UserGetResponse;
use OnlyFansAPI\Users\UserListResponse;

/**
 * APIs for fetching OnlyFans users.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class UsersService implements UsersContract
{
    /**
     * @api
     */
    public UsersRawService $raw;

    /**
     * @api
     */
    public RestrictService $restrict;

    /**
     * @api
     */
    public BlockService $block;

    /**
     * @api
     */
    public SubscribeService $subscribe;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsersRawService($client);
        $this->restrict = new RestrictService($client);
        $this->block = new BlockService($client);
        $this->subscribe = new SubscribeService($client);
    }

    /**
     * @api
     *
     * Get OnlyFans Profile details for a given username. User details are retrieved using the current `{account}` so fields like `subscribedOnData` which include potential subscription details will be included.
     *
     * @param string $username the OnlyFans username of the user to retrieve details for
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): UserGetResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($username, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Save on credits by getting up to 10 user details with a single request. User details are retrieved using the current `{account}` so fields like `subscribedOnData` which include potential subscription details will be included.
     *
     * @param string $account The Account ID
     * @param string $ids Comma-separated list of user IDs (max. 10 IDs). Must be at least 1 character.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        string $ids,
        RequestOptions|array|null $requestOptions = null,
    ): UserListResponse {
        $params = Util::removeNulls(['ids' => $ids]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
