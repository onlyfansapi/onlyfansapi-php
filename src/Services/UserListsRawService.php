<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\UserListsRawContract;
use Onlyfansapi\UserLists\UserListCreateParams;
use Onlyfansapi\UserLists\UserListDeleteParams;
use Onlyfansapi\UserLists\UserListDeleteResponse;
use Onlyfansapi\UserLists\UserListGetResponse;
use Onlyfansapi\UserLists\UserListListParams;
use Onlyfansapi\UserLists\UserListListResponse;
use Onlyfansapi\UserLists\UserListNewResponse;
use Onlyfansapi\UserLists\UserListRetrieveParams;
use Onlyfansapi\UserLists\UserListUpdateParams;
use Onlyfansapi\UserLists\UserListUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class UserListsRawService implements UserListsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a OnlyFans User List
     *
     * @param string $account The Account ID
     * @param array{name: string}|UserListCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserListNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|UserListCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/user-lists', $account],
            body: (object) $parsed,
            options: $options,
            convert: UserListNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a user list
     *
     * @param string $userListID OnlyFans User List ID, or a default list name like `tagged`
     * @param array{account: string}|UserListRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserListGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $userListID,
        array|UserListRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/user-lists/%2$s', $account, $userListID],
            options: $options,
            convert: UserListGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a OnlyFans User List
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param array{
     *   account: string, name: string, isPinnedToFeed?: bool|null
     * }|UserListUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserListUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $userListID,
        array|UserListUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/user-lists/%2$s', $account, $userListID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: UserListUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a list of OnlyFans Collections - User Lists
     *
     * @param string $account The Account ID
     * @param array{limit?: int|null, offset?: int|null}|UserListListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserListListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|UserListListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/user-lists', $account],
            query: $parsed,
            options: $options,
            convert: UserListListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a OnlyFans User List
     *
     * @param string $userListID OnlyFans User List ID, or a default list name like `tagged`
     * @param array{account: string}|UserListDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserListDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $userListID,
        array|UserListDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/user-lists/%2$s', $account, $userListID],
            options: $options,
            convert: UserListDeleteResponse::class,
        );
    }
}
