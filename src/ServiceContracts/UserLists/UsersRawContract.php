<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\UserLists;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\UserLists\Users\UserAddParams;
use Onlyfansapi\UserLists\Users\UserAddResponse;
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
