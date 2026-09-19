<?php

declare(strict_types=1);

namespace OnlyFansAPI\DataExports\DataExportNewResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   creditCalculationNote?: string|null,
 *   endDate?: string|null,
 *   fileType?: string|null,
 *   requiresScraping?: bool|null,
 *   startDate?: string|null,
 *   status?: string|null,
 *   type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('credit_calculation_note')]
    public ?string $creditCalculationNote;

    #[Optional('end_date')]
    public ?string $endDate;

    #[Optional('file_type')]
    public ?string $fileType;

    #[Optional('requires_scraping')]
    public ?bool $requiresScraping;

    #[Optional('start_date')]
    public ?string $startDate;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $creditCalculationNote = null,
        ?string $endDate = null,
        ?string $fileType = null,
        ?bool $requiresScraping = null,
        ?string $startDate = null,
        ?string $status = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $creditCalculationNote && $self['creditCalculationNote'] = $creditCalculationNote;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $fileType && $self['fileType'] = $fileType;
        null !== $requiresScraping && $self['requiresScraping'] = $requiresScraping;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreditCalculationNote(
        string $creditCalculationNote
    ): self {
        $self = clone $this;
        $self['creditCalculationNote'] = $creditCalculationNote;

        return $self;
    }

    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    public function withFileType(string $fileType): self
    {
        $self = clone $this;
        $self['fileType'] = $fileType;

        return $self;
    }

    public function withRequiresScraping(bool $requiresScraping): self
    {
        $self = clone $this;
        $self['requiresScraping'] = $requiresScraping;

        return $self;
    }

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
