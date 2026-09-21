<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\DataExports\DataExportCancelResponse;
use OnlyFansAPI\DataExports\DataExportGetResponse;
use OnlyFansAPI\DataExports\DataExportListParams\Status;
use OnlyFansAPI\DataExports\DataExportListParams\Type;
use OnlyFansAPI\DataExports\DataExportListResponse;
use OnlyFansAPI\DataExports\DataExportRetryResponse;
use OnlyFansAPI\DataExports\DataExportStartResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\DataExportsContract;

/**
 * APIs for managing data exports.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class DataExportsService implements DataExportsContract
{
    /**
     * @api
     */
    public DataExportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DataExportsRawService($client);
    }

    /**
     * @api
     *
     * Get the current status and progress of a data export
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
    ): DataExportGetResponse {
        $params = Util::removeNulls(
            ['downloadURLExpiresIn' => $downloadURLExpiresIn]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($dataExportID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of data exports for the team
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
    ): DataExportListResponse {
        $params = Util::removeNulls(
            [
                'downloadURLExpiresIn' => $downloadURLExpiresIn,
                'page' => $page,
                'perPage' => $perPage,
                'status' => $status,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Cancel a running data export. Only exports with status `pending` or `in_progress` can be cancelled.
     *
     * @param string $dataExportID The prefixed ID of the data export
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        string $dataExportID,
        RequestOptions|array|null $requestOptions = null
    ): DataExportCancelResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($dataExportID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new data export with the same parameters as a failed export and automatically start it.
     *
     * @param string $dataExportID The prefixed ID of the failed data export
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retry(
        string $dataExportID,
        RequestOptions|array|null $requestOptions = null
    ): DataExportRetryResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retry($dataExportID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start processing a data export that has completed credit calculation. This will begin the actual export process and charge credits.
     *
     * @param string $dataExportID The prefixed ID of the data export
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function start(
        string $dataExportID,
        RequestOptions|array|null $requestOptions = null
    ): DataExportStartResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->start($dataExportID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
