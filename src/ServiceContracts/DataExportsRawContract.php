<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\DataExports\DataExportCancelResponse;
use Onlyfansapi\DataExports\DataExportCreateParams;
use Onlyfansapi\DataExports\DataExportGetResponse;
use Onlyfansapi\DataExports\DataExportListParams;
use Onlyfansapi\DataExports\DataExportListResponse;
use Onlyfansapi\DataExports\DataExportNewResponse;
use Onlyfansapi\DataExports\DataExportRetrieveParams;
use Onlyfansapi\DataExports\DataExportRetryResponse;
use Onlyfansapi\DataExports\DataExportStartResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface DataExportsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DataExportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataExportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DataExportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dataExportID The prefixed ID of the data export
     * @param array<string,mixed>|DataExportRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataExportGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $dataExportID,
        array|DataExportRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DataExportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataExportListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|DataExportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dataExportID The prefixed ID of the data export
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataExportCancelResponse>
     *
     * @throws APIException
     */
    public function cancel(
        string $dataExportID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dataExportID The prefixed ID of the failed data export
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataExportRetryResponse>
     *
     * @throws APIException
     */
    public function retry(
        string $dataExportID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dataExportID The prefixed ID of the data export
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataExportStartResponse>
     *
     * @throws APIException
     */
    public function start(
        string $dataExportID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
