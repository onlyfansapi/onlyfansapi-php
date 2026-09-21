<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\DataExports\DataExportCancelResponse;
use OnlyFansAPI\DataExports\DataExportCreateParams;
use OnlyFansAPI\DataExports\DataExportGetResponse;
use OnlyFansAPI\DataExports\DataExportListParams;
use OnlyFansAPI\DataExports\DataExportListResponse;
use OnlyFansAPI\DataExports\DataExportNewResponse;
use OnlyFansAPI\DataExports\DataExportRetrieveParams;
use OnlyFansAPI\DataExports\DataExportRetryResponse;
use OnlyFansAPI\DataExports\DataExportStartResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
