<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\UserLists;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\UserLists\UsersRawContract;
use Onlyfansapi\UserLists\Users\UserAddParams;
use Onlyfansapi\UserLists\Users\UserAddResponse;
use Onlyfansapi\UserLists\Users\UserRemoveParams;
use Onlyfansapi\UserLists\Users\UserRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class UsersRawService implements UsersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add multiple Users To OnlyFans User List
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param array{account: string, ids: list<string>}|UserAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $userListID,
        array|UserAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserAddParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/user-lists/%2$s/users', $account, $userListID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: UserAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove User from OnlyFans User List
     *
     * @param int $userID OnlyFans User ID
     * @param array{account: string, userListID: string}|UserRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        int $userID,
        array|UserRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $userListID = $parsed['userListID'];
        unset($parsed['userListID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/user-lists/%2$s/users/%3$s', $account, $userListID, $userID,
            ],
            options: $options,
            convert: UserRemoveResponse::class,
        );
    }
}
