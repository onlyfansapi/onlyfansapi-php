<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\DataExports\DataExportCancelResponse;
use OnlyFansAPI\DataExports\DataExportCreateParams\FileType;
use OnlyFansAPI\DataExports\DataExportCreateParams\Type;
use OnlyFansAPI\DataExports\DataExportGetResponse;
use OnlyFansAPI\DataExports\DataExportListParams\Status;
use OnlyFansAPI\DataExports\DataExportListResponse;
use OnlyFansAPI\DataExports\DataExportNewResponse;
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
     * Create a new data export request. This will calculate the required credits and prepare the export for starting.
     *
     * @param string $endDate the end date for the export (ISO 8601 format)
     * @param FileType|value-of<FileType> $fileType The output file format. Supported formats vary by export type: `csv` or `xlsx` for transactions, chat_messages, fansly_chat_messages, trial_links, tracking_links, smart_links, payouts, chargebacks, public_profiles, fans, followings, profile_visitors; `zip` for media_vault.
     * @param string $startDate the start date for the export (ISO 8601 format)
     * @param Type|value-of<Type> $type The type of data to export. Use `fansly_chat_messages` to export Fansly chat messages (all other types are OnlyFans). `profile_visitors` returns one row per account per day, scraped one day at a time so the daily numbers are not aggregated away by OnlyFans.
     * @param list<string> $accountIDs Array of account prefixed IDs to export data from. Not required for `public_profiles` type. For `fansly_chat_messages`, pass Fansly account prefixed IDs (`fansly_acct_...`); all other types take OnlyFans account IDs.
     * @param bool $autoStart when true, automatically starts the export after creation
     * @param list<string> $exportColumns Array of column names to include in the export (optional, defaults to all columns for the export type)
     * @param array<string,mixed> $options Type-specific export options. For `chat_messages`: `maxMessages` (required per account, max 10,000,000), `maxChats` (optional per-account chat scrape limit), `skipMassMessages` (optional, bool), `chatIds` (optional array of numeric fan/chat IDs; filters output and can drastically reduce totals). For `fansly_chat_messages`: `maxMessages` (required per account, max 10,000,000), `maxChats` (optional per-account chat scrape limit), `chatIds` (optional array of Fansly group ID strings; filters output and can drastically reduce totals). For `media_vault`: `mediaType` (required, one of: `all`, `photo`, `gif`, `video`, `audio`). For `fans`: `type` (required, one of: `all`, `active`, `expired`, `latest`). For `followings`: `type` (required, one of: `all`, `active`, `expired`). For `public_profiles`: `query` (optional, full-text search), `gender` (optional, filter: male, female, trans, couple), `minSubscribePrice` (optional, USD), `maxSubscribePrice` (optional, USD), `location` (optional), `minPostsCount` (optional, minimum posts), `minPhotosCount` (optional, minimum photos), `minVideosCount` (optional, minimum videos), `minSubscribersCount` (optional, minimum subscribers), `maxSubscribersCount` (optional, maximum subscribers), `minJoinDate` (optional, ISO 8601 date), `minLastSeenAt` (optional, ISO 8601 date), `createdAtFrom` (optional, ISO 8601 date, profile added to DB after), `createdAtTo` (optional, ISO 8601 date, profile added to DB before), `instagram` (optional), `twitter` (optional), `tiktok` (optional), `maxResults` (optional, limit results).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $endDate,
        FileType|string $fileType,
        string $startDate,
        Type|string $type,
        ?array $accountIDs = null,
        ?bool $autoStart = null,
        ?array $exportColumns = null,
        ?array $options = null,
        RequestOptions|array|null $requestOptions = null,
    ): DataExportNewResponse {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'fileType' => $fileType,
                'startDate' => $startDate,
                'type' => $type,
                'accountIDs' => $accountIDs,
                'autoStart' => $autoStart,
                'exportColumns' => $exportColumns,
                'options' => $options,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param \OnlyFansAPI\DataExports\DataExportListParams\Type|value-of<\OnlyFansAPI\DataExports\DataExportListParams\Type> $type Filter by export type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $downloadURLExpiresIn = null,
        ?int $page = null,
        ?int $perPage = null,
        Status|string|null $status = null,
        \OnlyFansAPI\DataExports\DataExportListParams\Type|string|null $type = null,
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
