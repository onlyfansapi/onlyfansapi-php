<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\UserLists;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\UserLists\UsersContract;
use Onlyfansapi\UserLists\Users\UserAddResponse;
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
