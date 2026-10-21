<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\TrackingLinks\TrackingLinkCreateParams;
use OnlyFansAPI\TrackingLinks\TrackingLinkDeleteParams;
use OnlyFansAPI\TrackingLinks\TrackingLinkDeleteResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetCohortArpsParams;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetStatsParams;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetStatsResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams;
use OnlyFansAPI\TrackingLinks\TrackingLinkListResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkListSpendersParams;
use OnlyFansAPI\TrackingLinks\TrackingLinkListSpendersResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkListSubscribersParams;
use OnlyFansAPI\TrackingLinks\TrackingLinkListSubscribersResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkNewResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkRetrieveParams;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     * @param string $trackingLinkID the ID of the tracking link
     * @param array<string,mixed>|TrackingLinkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $trackingLinkID,
        array|TrackingLinkRetrieveParams $params,
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
     * @param string $trackingLinkID path param: The ID of the tracking link
     * @param array<string,mixed>|TrackingLinkGetCohortArpsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getCohortArps(
        string $trackingLinkID,
        array|TrackingLinkGetCohortArpsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $trackingLinkID path param: The ID of the tracking link
     * @param array<string,mixed>|TrackingLinkGetStatsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkGetStatsResponse>
     *
     * @throws APIException
     */
    public function getStats(
        string $trackingLinkID,
        array|TrackingLinkGetStatsParams $params,
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
