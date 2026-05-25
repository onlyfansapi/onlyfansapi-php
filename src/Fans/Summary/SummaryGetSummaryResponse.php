<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\Summary;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Fans\Summary\SummaryGetSummaryResponse\SummaryData;

/**
 * @phpstan-import-type SummaryDataShape from \OnlyFansAPI\Fans\Summary\SummaryGetSummaryResponse\SummaryData
 *
 * @phpstan-type SummaryGetSummaryResponseShape = array{
 *   analyzedMessageCount?: int|null,
 *   errorMessage?: string|null,
 *   lastAnalyzedAt?: string|null,
 *   status?: string|null,
 *   summaryData?: null|SummaryData|SummaryDataShape,
 * }
 */
final class SummaryGetSummaryResponse implements BaseModel
{
    /** @use SdkModel<SummaryGetSummaryResponseShape> */
    use SdkModel;

    #[Optional('analyzed_message_count')]
    public ?int $analyzedMessageCount;

    #[Optional('error_message', nullable: true)]
    public ?string $errorMessage;

    #[Optional('last_analyzed_at')]
    public ?string $lastAnalyzedAt;

    #[Optional]
    public ?string $status;

    #[Optional('summary_data')]
    public ?SummaryData $summaryData;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SummaryData|SummaryDataShape|null $summaryData
     */
    public static function with(
        ?int $analyzedMessageCount = null,
        ?string $errorMessage = null,
        ?string $lastAnalyzedAt = null,
        ?string $status = null,
        SummaryData|array|null $summaryData = null,
    ): self {
        $self = new self;

        null !== $analyzedMessageCount && $self['analyzedMessageCount'] = $analyzedMessageCount;
        null !== $errorMessage && $self['errorMessage'] = $errorMessage;
        null !== $lastAnalyzedAt && $self['lastAnalyzedAt'] = $lastAnalyzedAt;
        null !== $status && $self['status'] = $status;
        null !== $summaryData && $self['summaryData'] = $summaryData;

        return $self;
    }

    public function withAnalyzedMessageCount(int $analyzedMessageCount): self
    {
        $self = clone $this;
        $self['analyzedMessageCount'] = $analyzedMessageCount;

        return $self;
    }

    public function withErrorMessage(?string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }

    public function withLastAnalyzedAt(string $lastAnalyzedAt): self
    {
        $self = clone $this;
        $self['lastAnalyzedAt'] = $lastAnalyzedAt;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param SummaryData|SummaryDataShape $summaryData
     */
    public function withSummaryData(SummaryData|array $summaryData): self
    {
        $self = clone $this;
        $self['summaryData'] = $summaryData;

        return $self;
    }
}
