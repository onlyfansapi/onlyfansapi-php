<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Users\UserGetResponse;
use OnlyFansAPI\Users\UserListParams;
use OnlyFansAPI\Users\UserListResponse;
use OnlyFansAPI\Users\UserRetrieveParams;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface UsersRawContract
{
    /**
     * @api
     *
     * @param string $username the OnlyFans username of the user to retrieve details for
     * @param array<string,mixed>|UserRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        array|UserRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|UserListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|UserListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
