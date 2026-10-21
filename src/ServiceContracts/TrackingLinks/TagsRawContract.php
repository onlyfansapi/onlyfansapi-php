<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\TrackingLinks;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\TrackingLinks\Tags\TagAddParams;
use OnlyFansAPI\TrackingLinks\Tags\TagAddResponse;
use OnlyFansAPI\TrackingLinks\Tags\TagListParams;
use OnlyFansAPI\TrackingLinks\Tags\TagListResponse;
use OnlyFansAPI\TrackingLinks\Tags\TagRemoveParams;
use OnlyFansAPI\TrackingLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TagsRawContract
{
    /**
     * @api
     *
     * @param int $trackingLinkID The ID of the tracking link
     * @param array<string,mixed>|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $trackingLinkID,
        array|TagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $trackingLinkID Path param: The ID of the tracking link
     * @param array<string,mixed>|TagAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagAddResponse>
     *
     * @throws APIException
     */
    public function add(
        int $trackingLinkID,
        array|TagAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $trackingLinkID Path param: The ID of the tracking link
     * @param array<string,mixed>|TagRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        int $trackingLinkID,
        array|TagRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
