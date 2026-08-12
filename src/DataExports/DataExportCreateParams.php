<?php

declare(strict_types=1);

namespace OnlyFansAPI\DataExports;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\DataExports\DataExportCreateParams\FileType;
use OnlyFansAPI\DataExports\DataExportCreateParams\Type;

/**
 * Create a new data export request. This will calculate the required credits and prepare the export for starting.
 *
 * @see OnlyFansAPI\Services\DataExportsService::create()
 *
 * @phpstan-type DataExportCreateParamsShape = array{
 *   endDate: string,
 *   fileType: FileType|value-of<FileType>,
 *   startDate: string,
 *   type: Type|value-of<Type>,
 *   accountIDs?: list<string>|null,
 *   autoStart?: bool|null,
 *   exportColumns?: list<string>|null,
 *   options?: array<string,mixed>|null,
 * }
 */
final class DataExportCreateParams implements BaseModel
{
    /** @use SdkModel<DataExportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the export (ISO 8601 format).
     */
    #[Required('end_date')]
    public string $endDate;

    /**
     * The output file format. Supported formats vary by export type: `csv` or `xlsx` for transactions, chat_messages, trial_links, tracking_links, smart_links, payouts, chargebacks, public_profiles, fans, followings, profile_visitors; `zip` for media_vault.
     *
     * @var value-of<FileType> $fileType
     */
    #[Required('file_type', enum: FileType::class)]
    public string $fileType;

    /**
     * The start date for the export (ISO 8601 format).
     */
    #[Required('start_date')]
    public string $startDate;

    /**
     * The type of data to export. `profile_visitors` returns one row per account per day, scraped one day at a time so the daily numbers are not aggregated away by OnlyFans.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Array of account prefixed IDs to export data from. Not required for `public_profiles` type.
     *
     * @var list<string>|null $accountIDs
     */
    #[Optional('account_ids', list: 'string')]
    public ?array $accountIDs;

    /**
     * When true, automatically starts the export after creation.
     */
    #[Optional('auto_start')]
    public ?bool $autoStart;

    /**
     * Array of column names to include in the export (optional, defaults to all columns for the export type).
     *
     * @var list<string>|null $exportColumns
     */
    #[Optional('export_columns', list: 'string')]
    public ?array $exportColumns;

    /**
     * Type-specific export options. For `chat_messages`: `maxMessages` (required per account, max 10,000,000), `maxChats` (optional per-account chat scrape limit), `skipMassMessages` (optional, bool), `chatIds` (optional array of numeric fan/chat IDs; filters output and can drastically reduce totals). For `media_vault`: `mediaType` (required, one of: `all`, `photo`, `gif`, `video`, `audio`). For `fans`: `type` (required, one of: `all`, `active`, `expired`, `latest`). For `followings`: `type` (required, one of: `all`, `active`, `expired`). For `public_profiles`: `query` (optional, full-text search), `gender` (optional, filter: male, female, trans, couple), `minSubscribePrice` (optional, USD), `maxSubscribePrice` (optional, USD), `location` (optional), `minPostsCount` (optional, minimum posts), `minPhotosCount` (optional, minimum photos), `minVideosCount` (optional, minimum videos), `minSubscribersCount` (optional, minimum subscribers), `maxSubscribersCount` (optional, maximum subscribers), `minJoinDate` (optional, ISO 8601 date), `minLastSeenAt` (optional, ISO 8601 date), `createdAtFrom` (optional, ISO 8601 date, profile added to DB after), `createdAtTo` (optional, ISO 8601 date, profile added to DB before), `instagram` (optional), `twitter` (optional), `tiktok` (optional), `maxResults` (optional, limit results).
     *
     * @var array<string,mixed>|null $options
     */
    #[Optional(map: 'mixed')]
    public ?array $options;

    /**
     * `new DataExportCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DataExportCreateParams::with(
     *   endDate: ..., fileType: ..., startDate: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DataExportCreateParams)
     *   ->withEndDate(...)
     *   ->withFileType(...)
     *   ->withStartDate(...)
     *   ->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FileType|value-of<FileType> $fileType
     * @param Type|value-of<Type> $type
     * @param list<string>|null $accountIDs
     * @param list<string>|null $exportColumns
     * @param array<string,mixed>|null $options
     */
    public static function with(
        string $endDate,
        FileType|string $fileType,
        string $startDate,
        Type|string $type,
        ?array $accountIDs = null,
        ?bool $autoStart = null,
        ?array $exportColumns = null,
        ?array $options = null,
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['fileType'] = $fileType;
        $self['startDate'] = $startDate;
        $self['type'] = $type;

        null !== $accountIDs && $self['accountIDs'] = $accountIDs;
        null !== $autoStart && $self['autoStart'] = $autoStart;
        null !== $exportColumns && $self['exportColumns'] = $exportColumns;
        null !== $options && $self['options'] = $options;

        return $self;
    }

    /**
     * The end date for the export (ISO 8601 format).
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The output file format. Supported formats vary by export type: `csv` or `xlsx` for transactions, chat_messages, trial_links, tracking_links, smart_links, payouts, chargebacks, public_profiles, fans, followings, profile_visitors; `zip` for media_vault.
     *
     * @param FileType|value-of<FileType> $fileType
     */
    public function withFileType(FileType|string $fileType): self
    {
        $self = clone $this;
        $self['fileType'] = $fileType;

        return $self;
    }

    /**
     * The start date for the export (ISO 8601 format).
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The type of data to export. `profile_visitors` returns one row per account per day, scraped one day at a time so the daily numbers are not aggregated away by OnlyFans.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Array of account prefixed IDs to export data from. Not required for `public_profiles` type.
     *
     * @param list<string> $accountIDs
     */
    public function withAccountIDs(array $accountIDs): self
    {
        $self = clone $this;
        $self['accountIDs'] = $accountIDs;

        return $self;
    }

    /**
     * When true, automatically starts the export after creation.
     */
    public function withAutoStart(bool $autoStart): self
    {
        $self = clone $this;
        $self['autoStart'] = $autoStart;

        return $self;
    }

    /**
     * Array of column names to include in the export (optional, defaults to all columns for the export type).
     *
     * @param list<string> $exportColumns
     */
    public function withExportColumns(array $exportColumns): self
    {
        $self = clone $this;
        $self['exportColumns'] = $exportColumns;

        return $self;
    }

    /**
     * Type-specific export options. For `chat_messages`: `maxMessages` (required per account, max 10,000,000), `maxChats` (optional per-account chat scrape limit), `skipMassMessages` (optional, bool), `chatIds` (optional array of numeric fan/chat IDs; filters output and can drastically reduce totals). For `media_vault`: `mediaType` (required, one of: `all`, `photo`, `gif`, `video`, `audio`). For `fans`: `type` (required, one of: `all`, `active`, `expired`, `latest`). For `followings`: `type` (required, one of: `all`, `active`, `expired`). For `public_profiles`: `query` (optional, full-text search), `gender` (optional, filter: male, female, trans, couple), `minSubscribePrice` (optional, USD), `maxSubscribePrice` (optional, USD), `location` (optional), `minPostsCount` (optional, minimum posts), `minPhotosCount` (optional, minimum photos), `minVideosCount` (optional, minimum videos), `minSubscribersCount` (optional, minimum subscribers), `maxSubscribersCount` (optional, maximum subscribers), `minJoinDate` (optional, ISO 8601 date), `minLastSeenAt` (optional, ISO 8601 date), `createdAtFrom` (optional, ISO 8601 date, profile added to DB after), `createdAtTo` (optional, ISO 8601 date, profile added to DB before), `instagram` (optional), `twitter` (optional), `tiktok` (optional), `maxResults` (optional, limit results).
     *
     * @param array<string,mixed> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
