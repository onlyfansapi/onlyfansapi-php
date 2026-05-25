<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\UserLists;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\UserLists\Users\UserAddParams;
use OnlyFansAPI\UserLists\Users\UserAddResponse;
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
interface UsersRawContract
{
    /**
     * @api
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param array<string,mixed>|UserListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `tagged`
     * @param array<string,mixed>|UserAddParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userListID OnlyFans User List ID, or a default list name like `tagged`
     * @param array<string,mixed>|UserClearParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userListID Path param: OnlyFans User List ID, or a default list name like `friends`
     * @param array<string,mixed>|UserListPinnedParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $userID OnlyFans User ID to pin or unpin
     * @param array<string,mixed>|UserPinParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $userID OnlyFans User ID
     * @param array<string,mixed>|UserRemoveParams $params
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
    ): BaseResponse;
}
