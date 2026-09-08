<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\UserLists\UserListCreateParams;
use OnlyFansAPI\UserLists\UserListDeleteParams;
use OnlyFansAPI\UserLists\UserListDeleteResponse;
use OnlyFansAPI\UserLists\UserListGetResponse;
use OnlyFansAPI\UserLists\UserListListParams;
use OnlyFansAPI\UserLists\UserListListResponse;
use OnlyFansAPI\UserLists\UserListNewResponse;
use OnlyFansAPI\UserLists\UserListRetrieveParams;
use OnlyFansAPI\UserLists\UserListUpdateParams;
use OnlyFansAPI\UserLists\UserListUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface UserListsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|UserListCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userListID OnlyFans User List ID, or a default list name like `tagged`
     * @param array<string,mixed>|UserListRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param array<string,mixed>|UserListUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|UserListListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userListID OnlyFans User List ID, or a default list name like `tagged`
     * @param array<string,mixed>|UserListDeleteParams $params
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
    ): BaseResponse;
}
