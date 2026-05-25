<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackCreateParams;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackGetResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackNewResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
