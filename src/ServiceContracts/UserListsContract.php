<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\UserLists\UserListDeleteResponse;
use OnlyFansAPI\UserLists\UserListGetResponse;
use OnlyFansAPI\UserLists\UserListListParams\View;
use OnlyFansAPI\UserLists\UserListListResponse;
use OnlyFansAPI\UserLists\UserListNewResponse;
use OnlyFansAPI\UserLists\UserListUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface UserListsContract
{
    /**
     * @api
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
    ): UserListNewResponse;

    /**
     * @api
     *
     * @param string $userListID OnlyFans User List ID, or a default list name like `tagged`
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $userListID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): UserListGetResponse;

    /**
     * @api
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param string $account Path param: The Account ID
     * @param string $name body param: The new name for the User List
     * @param bool|null $isPinnedToFeed body param: Whether to pin the User List to feed to the OnlyFans homepage or not
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $userListID,
        string $account,
        string $name,
        ?bool $isPinnedToFeed = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserListUpdateResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int|null $limit How many results to return in the request. Max. 50 user lists. Must be at least 10. Must not be greater than 50.
     * @param int|null $offset must be at least 0
     * @param View|value-of<View> $view How to return the results. `queue` returns the user lists that are available for Mass-Messaging.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        View|string|null $view = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserListListResponse;

    /**
     * @api
     *
     * @param string $userListID OnlyFans User List ID, or a default list name like `tagged`
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $userListID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): UserListDeleteResponse;
}
