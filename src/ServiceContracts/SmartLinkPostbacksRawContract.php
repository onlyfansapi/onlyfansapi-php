<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackCreateParams;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackGetResponse;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackListResponse;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackNewResponse;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateParams;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SmartLinkPostbacksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SmartLinkPostbackCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkPostbackNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SmartLinkPostbackCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postbackID The postback ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkPostbackGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        int $postbackID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postbackID The postback ID
     * @param array<string,mixed>|SmartLinkPostbackUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkPostbackUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        int $postbackID,
        array|SmartLinkPostbackUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkPostbackListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $postbackID The postback ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function delete(
        int $postbackID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
