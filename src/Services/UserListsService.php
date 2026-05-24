<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\UserListsContract;
use Onlyfansapi\Services\UserLists\UsersService;
use Onlyfansapi\UserLists\UserListDeleteResponse;
use Onlyfansapi\UserLists\UserListListResponse;
use Onlyfansapi\UserLists\UserListNewResponse;
use Onlyfansapi\UserLists\UserListUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class UserListsService implements UserListsContract
{
    /**
     * @api
     */
    public UserListsRawService $raw;

    /**
     * @api
     */
    public UsersService $users;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UserListsRawService($client);
        $this->users = new UsersService($client);
    }

    /**
     * @api
     *
     * Create a OnlyFans User List
     *
     * @param string $account The Account ID
     * @param string $name must not be greater than 64 characters
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): UserListNewResponse {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a OnlyFans User List
     *
     * @param int $userListID Path param: OnlyFans User List ID
     * @param string $account Path param: The Account ID
     * @param string $name body param: Must not be greater than 64 characters
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $userListID,
        string $account,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): UserListUpdateResponse {
        $params = Util::removeNulls(['account' => $account, 'name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($userListID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of OnlyFans Collections - User Lists
     *
     * @param string $account The Account ID
     * @param int|null $limit How many results to return in the request. Max. 50 user lists. Must be at least 10. Must not be greater than 50.
     * @param int|null $offset must be at least 0
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserListListResponse {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a OnlyFans User List
     *
     * @param int $userListID OnlyFans User List ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $userListID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): UserListDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($userListID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
