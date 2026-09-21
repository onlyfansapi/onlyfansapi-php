<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\DataExports\DataExportCancelResponse;
use OnlyFansAPI\DataExports\DataExportGetResponse;
use OnlyFansAPI\DataExports\DataExportListParams\Status;
use OnlyFansAPI\DataExports\DataExportListParams\Type;
use OnlyFansAPI\DataExports\DataExportListResponse;
use OnlyFansAPI\DataExports\DataExportRetryResponse;
use OnlyFansAPI\DataExports\DataExportStartResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface DataExportsContract
{
    /**
     * @api
     *
     * @param string $dataExportID The prefixed ID of the data export
     * @param int $downloadURLExpiresIn Number of minutes until the download URL expires. Min `1`, max `60`, default `5`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $dataExportID,
        ?int $downloadURLExpiresIn = null,
        RequestOptions|array|null $requestOptions = null,
    ): DataExportGetResponse;

    /**
     * @api
     *
     * @param int $downloadURLExpiresIn Number of minutes until download URLs expire. Min `1`, max `60`, default `5`.
     * @param int $page Page number for pagination. Default `1`
     * @param int $perPage Number of results per page. Default `15`, max `100`
     * @param Status|value-of<Status> $status Filter by status
     * @param Type|value-of<Type> $type Filter by export type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $downloadURLExpiresIn = null,
        ?int $page = null,
        ?int $perPage = null,
        Status|string|null $status = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): DataExportListResponse;

    /**
     * @api
     *
     * @param string $dataExportID The prefixed ID of the data export
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        string $dataExportID,
        RequestOptions|array|null $requestOptions = null
    ): DataExportCancelResponse;

    /**
     * @api
     *
     * @param string $dataExportID The prefixed ID of the failed data export
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retry(
        string $dataExportID,
        RequestOptions|array|null $requestOptions = null
    ): DataExportRetryResponse;

    /**
     * @api
     *
     * @param string $dataExportID The prefixed ID of the data export
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function start(
        string $dataExportID,
        RequestOptions|array|null $requestOptions = null
    ): DataExportStartResponse;
}
