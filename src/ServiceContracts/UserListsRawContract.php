<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\UserLists\UserListCreateParams;
use Onlyfansapi\UserLists\UserListDeleteParams;
use Onlyfansapi\UserLists\UserListDeleteResponse;
use Onlyfansapi\UserLists\UserListListParams;
use Onlyfansapi\UserLists\UserListListResponse;
use Onlyfansapi\UserLists\UserListNewResponse;
use Onlyfansapi\UserLists\UserListUpdateParams;
use Onlyfansapi\UserLists\UserListUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
