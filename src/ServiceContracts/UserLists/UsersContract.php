<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\UserLists;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\UserLists\Users\UserAddResponse;
use OnlyFansAPI\UserLists\Users\UserClearResponse;
use OnlyFansAPI\UserLists\Users\UserListPinnedResponse;
use OnlyFansAPI\UserLists\Users\UserListResponse;
use OnlyFansAPI\UserLists\Users\UserPinResponse;
use OnlyFansAPI\UserLists\Users\UserRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface UsersContract
{
    /**
     * @api
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
    ): UserListResponse;

    /**
     * @api
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
    ): UserAddResponse;

    /**
     * @api
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
    ): UserClearResponse;

    /**
     * @api
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
    ): UserListPinnedResponse;

    /**
     * @api
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
    ): UserPinResponse;

    /**
     * @api
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
    ): UserRemoveResponse;
}
