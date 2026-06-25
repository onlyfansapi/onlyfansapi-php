<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
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

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface DataExportsContract
{
    /**
     * @api
     *
     * @param string $endDate the end date for the export (ISO 8601 format)
     * @param FileType|value-of<FileType> $fileType The output file format. Supported formats vary by export type: `csv` or `xlsx` for transactions, chat_messages, trial_links, tracking_links, smart_links, payouts, chargebacks, public_profiles, fans, followings; `zip` for media_vault.
     * @param string $startDate the start date for the export (ISO 8601 format)
     * @param Type|value-of<Type> $type The type of data to export
     * @param list<string> $accountIDs Array of account prefixed IDs to export data from. Not required for `public_profiles` type.
     * @param bool $autoStart when true, automatically starts the export after creation
     * @param list<string> $exportColumns Array of column names to include in the export (optional, defaults to all columns for the export type)
     * @param array<string,mixed> $options Type-specific export options. For `chat_messages`: `maxMessages` (required per account, max 10,000,000), `maxChats` (optional per-account chat scrape limit), `skipMassMessages` (optional, bool), `chatIds` (optional array of numeric fan/chat IDs; filters output and can drastically reduce totals). For `media_vault`: `mediaType` (required, one of: `all`, `photo`, `gif`, `video`, `audio`). For `fans`: `type` (required, one of: `all`, `active`, `expired`, `latest`). For `followings`: `type` (required, one of: `all`, `active`, `expired`). For `public_profiles`: `query` (optional, full-text search), `gender` (optional, filter: male, female, trans, couple), `minSubscribePrice` (optional, USD), `maxSubscribePrice` (optional, USD), `location` (optional), `minPostsCount` (optional, minimum posts), `minPhotosCount` (optional, minimum photos), `minVideosCount` (optional, minimum videos), `minSubscribersCount` (optional, minimum subscribers), `maxSubscribersCount` (optional, maximum subscribers), `minJoinDate` (optional, ISO 8601 date), `minLastSeenAt` (optional, ISO 8601 date), `createdAtFrom` (optional, ISO 8601 date, profile added to DB after), `createdAtTo` (optional, ISO 8601 date, profile added to DB before), `instagram` (optional), `twitter` (optional), `tiktok` (optional), `maxResults` (optional, limit results).
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
    ): DataExportNewResponse;

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
