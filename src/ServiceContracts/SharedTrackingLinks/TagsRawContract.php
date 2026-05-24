<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SharedTrackingLinks;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SharedTrackingLinks\Tags\TagAddParams;
use Onlyfansapi\SharedTrackingLinks\Tags\TagAddResponse;
use Onlyfansapi\SharedTrackingLinks\Tags\TagListParams;
use Onlyfansapi\SharedTrackingLinks\Tags\TagListResponse;
use Onlyfansapi\SharedTrackingLinks\Tags\TagRemoveParams;
use Onlyfansapi\SharedTrackingLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface TagsRawContract
{
    /**
     * @api
     *
     * @param int $sharedTrackingLinkID The OnlyFans-side ID of the shared tracking link
     * @param array<string,mixed>|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $sharedTrackingLinkID,
        array|TagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $sharedTrackingLinkID Path param: The OnlyFans-side ID of the shared tracking link
     * @param array<string,mixed>|TagAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagAddResponse>
     *
     * @throws APIException
     */
    public function add(
        int $sharedTrackingLinkID,
        array|TagAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $sharedTrackingLinkID Path param: The OnlyFans-side ID of the shared tracking link
     * @param array<string,mixed>|TagRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        int $sharedTrackingLinkID,
        array|TagRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
