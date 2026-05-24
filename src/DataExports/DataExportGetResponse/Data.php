<?php

declare(strict_types=1);

namespace Onlyfansapi\DataExports\DataExportGetResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\DataExports\DataExportGetResponse\Data\Account;

/**
 * @phpstan-import-type AccountShape from \Onlyfansapi\DataExports\DataExportGetResponse\Data\Account
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   accounts?: list<Account|AccountShape>|null,
 *   completedAt?: string|null,
 *   createdAt?: string|null,
 *   creditCost?: int|null,
 *   endDate?: string|null,
 *   exportColumns?: list<string>|null,
 *   failedAt?: string|null,
 *   failedReason?: string|null,
 *   fileType?: string|null,
 *   progressPercentage?: int|null,
 *   rowsProcessed?: int|null,
 *   startDate?: string|null,
 *   status?: string|null,
 *   totalRows?: int|null,
 *   type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /** @var list<Account>|null $accounts */
    #[Optional(list: Account::class)]
    public ?array $accounts;

    #[Optional('completed_at', nullable: true)]
    public ?string $completedAt;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('credit_cost')]
    public ?int $creditCost;

    #[Optional('end_date')]
    public ?string $endDate;

    /** @var list<string>|null $exportColumns */
    #[Optional('export_columns', list: 'string')]
    public ?array $exportColumns;

    #[Optional('failed_at', nullable: true)]
    public ?string $failedAt;

    #[Optional('failed_reason', nullable: true)]
    public ?string $failedReason;

    #[Optional('file_type')]
    public ?string $fileType;

    #[Optional('progress_percentage')]
    public ?int $progressPercentage;

    #[Optional('rows_processed')]
    public ?int $rowsProcessed;

    #[Optional('start_date')]
    public ?string $startDate;

    #[Optional]
    public ?string $status;

    #[Optional('total_rows')]
    public ?int $totalRows;

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
     *
     * @param list<Account|AccountShape>|null $accounts
     * @param list<string>|null $exportColumns
     */
    public static function with(
        ?string $id = null,
        ?array $accounts = null,
        ?string $completedAt = null,
        ?string $createdAt = null,
        ?int $creditCost = null,
        ?string $endDate = null,
        ?array $exportColumns = null,
        ?string $failedAt = null,
        ?string $failedReason = null,
        ?string $fileType = null,
        ?int $progressPercentage = null,
        ?int $rowsProcessed = null,
        ?string $startDate = null,
        ?string $status = null,
        ?int $totalRows = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $accounts && $self['accounts'] = $accounts;
        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $creditCost && $self['creditCost'] = $creditCost;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $exportColumns && $self['exportColumns'] = $exportColumns;
        null !== $failedAt && $self['failedAt'] = $failedAt;
        null !== $failedReason && $self['failedReason'] = $failedReason;
        null !== $fileType && $self['fileType'] = $fileType;
        null !== $progressPercentage && $self['progressPercentage'] = $progressPercentage;
        null !== $rowsProcessed && $self['rowsProcessed'] = $rowsProcessed;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $status && $self['status'] = $status;
        null !== $totalRows && $self['totalRows'] = $totalRows;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<Account|AccountShape> $accounts
     */
    public function withAccounts(array $accounts): self
    {
        $self = clone $this;
        $self['accounts'] = $accounts;

        return $self;
    }

    public function withCompletedAt(?string $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreditCost(int $creditCost): self
    {
        $self = clone $this;
        $self['creditCost'] = $creditCost;

        return $self;
    }

    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * @param list<string> $exportColumns
     */
    public function withExportColumns(array $exportColumns): self
    {
        $self = clone $this;
        $self['exportColumns'] = $exportColumns;

        return $self;
    }

    public function withFailedAt(?string $failedAt): self
    {
        $self = clone $this;
        $self['failedAt'] = $failedAt;

        return $self;
    }

    public function withFailedReason(?string $failedReason): self
    {
        $self = clone $this;
        $self['failedReason'] = $failedReason;

        return $self;
    }

    public function withFileType(string $fileType): self
    {
        $self = clone $this;
        $self['fileType'] = $fileType;

        return $self;
    }

    public function withProgressPercentage(int $progressPercentage): self
    {
        $self = clone $this;
        $self['progressPercentage'] = $progressPercentage;

        return $self;
    }

    public function withRowsProcessed(int $rowsProcessed): self
    {
        $self = clone $this;
        $self['rowsProcessed'] = $rowsProcessed;

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

    public function withTotalRows(int $totalRows): self
    {
        $self = clone $this;
        $self['totalRows'] = $totalRows;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
