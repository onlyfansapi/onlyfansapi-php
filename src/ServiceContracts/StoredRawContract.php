<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Stored\StoredListSharedTrackingLinksParams;
use OnlyFansAPI\Stored\StoredListSharedTrackingLinksResponse;
use OnlyFansAPI\Stored\StoredListSharedTrialLinksParams;
use OnlyFansAPI\Stored\StoredListSharedTrialLinksResponse;
use OnlyFansAPI\Stored\StoredListTrackingLinksParams;
use OnlyFansAPI\Stored\StoredListTrackingLinksResponse;
use OnlyFansAPI\Stored\StoredListTrialLinksParams;
use OnlyFansAPI\Stored\StoredListTrialLinksResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface StoredRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StoredListSharedTrackingLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoredListSharedTrackingLinksResponse>
     *
     * @throws APIException
     */
    public function listSharedTrackingLinks(
        string $account,
        array|StoredListSharedTrackingLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StoredListSharedTrialLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoredListSharedTrialLinksResponse>
     *
     * @throws APIException
     */
    public function listSharedTrialLinks(
        string $account,
        array|StoredListSharedTrialLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StoredListTrackingLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoredListTrackingLinksResponse>
     *
     * @throws APIException
     */
    public function listTrackingLinks(
        string $account,
        array|StoredListTrackingLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StoredListTrialLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoredListTrialLinksResponse>
     *
     * @throws APIException
     */
    public function listTrialLinks(
        string $account,
        array|StoredListTrialLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
