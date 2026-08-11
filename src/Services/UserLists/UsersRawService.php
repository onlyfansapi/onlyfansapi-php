<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\UserLists;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\UserLists\UsersRawContract;
use OnlyFansAPI\UserLists\Users\UserAddParams;
use OnlyFansAPI\UserLists\Users\UserAddResponse;
use OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember0;
use OnlyFansAPI\UserLists\Users\UserAddResponse\UnionMember1;
use OnlyFansAPI\UserLists\Users\UserClearParams;
use OnlyFansAPI\UserLists\Users\UserClearResponse;
use OnlyFansAPI\UserLists\Users\UserListParams;
use OnlyFansAPI\UserLists\Users\UserListPinnedParams;
use OnlyFansAPI\UserLists\Users\UserListPinnedResponse;
use OnlyFansAPI\UserLists\Users\UserListResponse;
use OnlyFansAPI\UserLists\Users\UserPinParams;
use OnlyFansAPI\UserLists\Users\UserPinResponse;
use OnlyFansAPI\UserLists\Users\UserRemoveParams;
use OnlyFansAPI\UserLists\Users\UserRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     * Get all users in a OnlyFans User List
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param array{
     *   account: string, limit?: string, offset?: string
     * }|UserListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $userListID,
        array|UserListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/user-lists/%2$s/users', $account, $userListID],
            query: $parsed,
            options: $options,
            convert: UserListResponse::class,
        );
    }

    /**
     * @api
     *
     * Add multiple Users To OnlyFans User List
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param array{
     *   account: string, ids: list<string>, skipInvalid?: bool
     * }|UserAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnionMember0|UnionMember1>
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
     * Remove all users from a OnlyFans User List
     *
     * @param string $userListID OnlyFans User List ID, or a default list name like `tagged`
     * @param array{account: string}|UserClearParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserClearResponse>
     *
     * @throws APIException
     */
    public function clear(
        string $userListID,
        array|UserClearParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserClearParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/user-lists/%2$s/users', $account, $userListID],
            options: $options,
            convert: UserClearResponse::class,
        );
    }

    /**
     * @api
     *
     * Get pinned users from an OnlyFans User List.
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `friends`
     * @param array{
     *   account: string, limit?: string, offset?: string
     * }|UserListPinnedParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserListPinnedResponse>
     *
     * @throws APIException
     */
    public function listPinned(
        string $userListID,
        array|UserListPinnedParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListPinnedParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/user-lists/%2$s/users/pinned', $account, $userListID],
            query: $parsed,
            options: $options,
            convert: UserListPinnedResponse::class,
        );
    }

    /**
     * @api
     *
     * Pin a user in any OnlyFans user list.
     *
     * @param int $userID OnlyFans User ID to pin or unpin
     * @param array{account: string, userListID: string}|UserPinParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserPinResponse>
     *
     * @throws APIException
     */
    public function pin(
        int $userID,
        array|UserPinParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserPinParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);
        $userListID = $parsed['userListID'];
        unset($parsed['userListID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'api/%1$s/user-lists/%2$s/users/%3$s/pin',
                $account,
                $userListID,
                $userID,
            ],
            options: $options,
            convert: UserPinResponse::class,
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
