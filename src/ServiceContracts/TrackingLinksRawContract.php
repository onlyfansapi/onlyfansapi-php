<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\TrackingLinks\TrackingLinkCreateParams;
use Onlyfansapi\TrackingLinks\TrackingLinkDeleteParams;
use Onlyfansapi\TrackingLinks\TrackingLinkDeleteResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkListParams;
use Onlyfansapi\TrackingLinks\TrackingLinkListResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkListSpendersParams;
use Onlyfansapi\TrackingLinks\TrackingLinkListSpendersResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkListSubscribersParams;
use Onlyfansapi\TrackingLinks\TrackingLinkListSubscribersResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface TrackingLinksRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|TrackingLinkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|TrackingLinkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|TrackingLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|TrackingLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $trackingLinkID the ID of the tracking link
     * @param array<string,mixed>|TrackingLinkDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $trackingLinkID,
        array|TrackingLinkDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $trackingLinkID Path param: The ID of the Tracking Link. Can be retrieved from the above store and list endpoints.
     * @param array<string,mixed>|TrackingLinkListSpendersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkListSpendersResponse>
     *
     * @throws APIException
     */
    public function listSpenders(
        string $trackingLinkID,
        array|TrackingLinkListSpendersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $trackingLinkID Path param: The ID of the Tracking Link. Can be retrieved from the above store and list endpoints.
     * @param array<string,mixed>|TrackingLinkListSubscribersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkListSubscribersResponse>
     *
     * @throws APIException
     */
    public function listSubscribers(
        string $trackingLinkID,
        array|TrackingLinkListSubscribersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
