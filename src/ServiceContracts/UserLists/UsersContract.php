<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\UserLists;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\UserLists\Users\UserAddResponse;
use Onlyfansapi\UserLists\Users\UserRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface UsersContract
{
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
