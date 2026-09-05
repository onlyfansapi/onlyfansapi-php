<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Following\FollowingListActiveParams;
use OnlyFansAPI\Following\FollowingListActiveResponse;
use OnlyFansAPI\Following\FollowingListAllParams;
use OnlyFansAPI\Following\FollowingListAllResponse;
use OnlyFansAPI\Following\FollowingListExpiredParams;
use OnlyFansAPI\Following\FollowingListExpiredResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface FollowingRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|FollowingListActiveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FollowingListActiveResponse>
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        array|FollowingListActiveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|FollowingListAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FollowingListAllResponse>
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        array|FollowingListAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|FollowingListExpiredParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FollowingListExpiredResponse>
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        array|FollowingListExpiredParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
