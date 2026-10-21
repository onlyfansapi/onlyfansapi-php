<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Bundles\BundleCreateParams;
use OnlyFansAPI\Bundles\BundleDeleteParams;
use OnlyFansAPI\Bundles\BundleDeleteResponse;
use OnlyFansAPI\Bundles\BundleListResponse;
use OnlyFansAPI\Bundles\BundleNewResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface BundlesRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|BundleCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BundleNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|BundleCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BundleListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $bundleID the ID of the bundle to delete
     * @param array<string,mixed>|BundleDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BundleDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $bundleID,
        array|BundleDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
