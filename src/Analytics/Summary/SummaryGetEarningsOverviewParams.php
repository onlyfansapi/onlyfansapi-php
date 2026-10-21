<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Summary;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get earnings overview by category for selected accounts within a date range. Returns total earnings, subscriptions, posts, messages, tips, streams, and content stats.
 *
 * @see OnlyFansAPI\Services\Analytics\SummaryService::getEarningsOverview()
 *
 * @phpstan-type SummaryGetEarningsOverviewParamsShape = array{
 *   accountIDs: list<string>, endDate: string, startDate: string
 * }
 */
final class SummaryGetEarningsOverviewParams implements BaseModel
{
    /** @use SdkModel<SummaryGetEarningsOverviewParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of account prefixed IDs to get earnings for.
     *
     * @var list<string> $accountIDs
     */
    #[Required('account_ids', list: 'string')]
    public array $accountIDs;

    /**
     * The end date (ISO 8601 format).
     */
    #[Required('end_date')]
    public string $endDate;

    /**
     * The start date (ISO 8601 format).
     */
    #[Required('start_date')]
    public string $startDate;

    /**
     * `new SummaryGetEarningsOverviewParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SummaryGetEarningsOverviewParams::with(
     *   accountIDs: ..., endDate: ..., startDate: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SummaryGetEarningsOverviewParams)
     *   ->withAccountIDs(...)
     *   ->withEndDate(...)
     *   ->withStartDate(...)
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
     * @param list<string> $accountIDs
     */
    public static function with(
        array $accountIDs,
        string $endDate,
        string $startDate
    ): self {
        $self = new self;

        $self['accountIDs'] = $accountIDs;
        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Array of account prefixed IDs to get earnings for.
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
     * The end date (ISO 8601 format).
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date (ISO 8601 format).
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
