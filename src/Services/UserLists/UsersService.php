<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\UserLists;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\UserLists\UsersContract;
use Onlyfansapi\UserLists\Users\UserAddResponse;
use Onlyfansapi\UserLists\Users\UserClearResponse;
use Onlyfansapi\UserLists\Users\UserListPinnedResponse;
use Onlyfansapi\UserLists\Users\UserListResponse;
use Onlyfansapi\UserLists\Users\UserPinResponse;
use Onlyfansapi\UserLists\Users\UserRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class UsersService implements UsersContract
{
    /**
     * @api
     */
    public UsersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsersRawService($client);
    }

    /**
     * @api
     *
     * Get all users in a OnlyFans User List
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param string $account Path param: The Account ID
     * @param string $limit Query param: Number of users to return (1 - 100). Default = 10
     * @param string $offset Query param: Number of users to skip for pagination
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $userListID,
        string $account,
        ?string $limit = null,
        ?string $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserListResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($userListID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add multiple Users To OnlyFans User List
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param string $account Path param: The Account ID
     * @param list<string> $ids Body param: Array of OnlyFans User IDs to be added into the list
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $userListID,
        string $account,
        array $ids,
        RequestOptions|array|null $requestOptions = null,
    ): UserAddResponse {
        $params = Util::removeNulls(['account' => $account, 'ids' => $ids]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($userListID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove all users from a OnlyFans User List
     *
     * @param string $userListID OnlyFans User List ID, or a default list name like `tagged`
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function clear(
        string $userListID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): UserClearResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clear($userListID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get pinned users from an OnlyFans User List.
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `friends`
     * @param string $account Path param: The Account ID
     * @param string $limit Query param: Number of users to return (1 - 100). Default = 10
     * @param string $offset Query param: Number of users to skip for pagination
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPinned(
        string $userListID,
        string $account,
        ?string $limit = null,
        ?string $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserListPinnedResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listPinned($userListID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pin a user in any OnlyFans user list.
     *
     * @param int $userID OnlyFans User ID to pin or unpin
     * @param string $account The Account ID
     * @param string $userListID OnlyFans User List ID, or a default list name like `friends`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pin(
        int $userID,
        string $account,
        string $userListID,
        RequestOptions|array|null $requestOptions = null,
    ): UserPinResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'userListID' => $userListID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pin($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove User from OnlyFans User List
     *
     * @param int $userID OnlyFans User ID
     * @param string $account The Account ID
     * @param string $userListID OnlyFans User List ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        int $userID,
        string $account,
        string $userListID,
        RequestOptions|array|null $requestOptions = null,
    ): UserRemoveResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'userListID' => $userListID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
