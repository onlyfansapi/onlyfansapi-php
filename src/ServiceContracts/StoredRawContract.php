<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Stored\StoredListSharedTrackingLinksParams;
use Onlyfansapi\Stored\StoredListSharedTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListSharedTrialLinksParams;
use Onlyfansapi\Stored\StoredListSharedTrialLinksResponse;
use Onlyfansapi\Stored\StoredListTrackingLinksParams;
use Onlyfansapi\Stored\StoredListTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListTrialLinksParams;
use Onlyfansapi\Stored\StoredListTrialLinksResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
