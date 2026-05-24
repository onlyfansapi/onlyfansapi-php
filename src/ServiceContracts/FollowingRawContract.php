<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Following\FollowingListActiveParams;
use Onlyfansapi\Following\FollowingListActiveResponse;
use Onlyfansapi\Following\FollowingListAllParams;
use Onlyfansapi\Following\FollowingListAllResponse;
use Onlyfansapi\Following\FollowingListExpiredParams;
use Onlyfansapi\Following\FollowingListExpiredResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
