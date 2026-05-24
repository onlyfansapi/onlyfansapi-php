<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\UserLists;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\UserLists\Users\UserAddParams;
use Onlyfansapi\UserLists\Users\UserAddResponse;
use Onlyfansapi\UserLists\Users\UserClearParams;
use Onlyfansapi\UserLists\Users\UserClearResponse;
use Onlyfansapi\UserLists\Users\UserListParams;
use Onlyfansapi\UserLists\Users\UserListPinnedParams;
use Onlyfansapi\UserLists\Users\UserListPinnedResponse;
use Onlyfansapi\UserLists\Users\UserListResponse;
use Onlyfansapi\UserLists\Users\UserPinParams;
use Onlyfansapi\UserLists\Users\UserPinResponse;
use Onlyfansapi\UserLists\Users\UserRemoveParams;
use Onlyfansapi\UserLists\Users\UserRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
