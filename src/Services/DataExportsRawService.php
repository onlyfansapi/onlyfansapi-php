<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\DataExports\DataExportCancelResponse;
use Onlyfansapi\DataExports\DataExportCreateParams;
use Onlyfansapi\DataExports\DataExportCreateParams\FileType;
use Onlyfansapi\DataExports\DataExportCreateParams\Type;
use Onlyfansapi\DataExports\DataExportGetResponse;
use Onlyfansapi\DataExports\DataExportListParams;
use Onlyfansapi\DataExports\DataExportListParams\Status;
use Onlyfansapi\DataExports\DataExportListResponse;
use Onlyfansapi\DataExports\DataExportNewResponse;
use Onlyfansapi\DataExports\DataExportRetrieveParams;
use Onlyfansapi\DataExports\DataExportRetryResponse;
use Onlyfansapi\DataExports\DataExportStartResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\DataExportsRawContract;

/**
 * APIs for managing data exports.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class DataExportsRawService implements DataExportsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new data export request. This will calculate the required credits and prepare the export for starting.
     *
     * @param array{
     *   endDate: string,
     *   fileType: FileType|value-of<FileType>,
     *   startDate: string,
     *   type: value-of<Type>,
     *   accountIDs?: list<string>,
     *   autoStart?: bool,
     *   exportColumns?: list<string>,
     *   options?: array<string,mixed>,
     * }|DataExportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataExportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DataExportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DataExportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/data-exports',
            body: (object) $parsed,
            options: $options,
            convert: DataExportNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the current status and progress of a data export
     *
     * @param string $dataExportID The prefixed ID of the data export
     * @param array{downloadURLExpiresIn?: int}|DataExportRetrieveParams $params
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
    ): BaseResponse {
        [$parsed, $options] = DataExportRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/data-exports/%1$s', $dataExportID],
            query: Util::array_transform_keys(
                $parsed,
                ['downloadURLExpiresIn' => 'download_url_expires_in']
            ),
            options: $options,
            convert: DataExportGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of data exports for the team
     *
     * @param array{
     *   downloadURLExpiresIn?: int,
     *   page?: int,
     *   perPage?: int,
     *   status?: value-of<Status>,
     *   type?: value-of<DataExportListParams\Type>,
     * }|DataExportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataExportListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|DataExportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DataExportListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/data-exports',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'downloadURLExpiresIn' => 'download_url_expires_in',
                    'perPage' => 'per_page',
                ],
            ),
            options: $options,
            convert: DataExportListResponse::class,
        );
    }

    /**
     * @api
     *
     * Cancel a running data export. Only exports with status `pending` or `in_progress` can be cancelled.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/data-exports/%1$s', $dataExportID],
            options: $requestOptions,
            convert: DataExportCancelResponse::class,
        );
    }

    /**
     * @api
     *
     * Create a new data export with the same parameters as a failed export and automatically start it.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/data-exports/%1$s/retry', $dataExportID],
            options: $requestOptions,
            convert: DataExportRetryResponse::class,
        );
    }

    /**
     * @api
     *
     * Start processing a data export that has completed credit calculation. This will begin the actual export process and charge credits.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/data-exports/%1$s/start', $dataExportID],
            options: $requestOptions,
            convert: DataExportStartResponse::class,
        );
    }
}
