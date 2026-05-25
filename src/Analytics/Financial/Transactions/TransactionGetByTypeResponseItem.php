<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Financial\Transactions;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type TransactionGetByTypeResponseItemShape = array{
 *   count?: int|null, total?: float|null, type?: string|null
 * }
 */
final class TransactionGetByTypeResponseItem implements BaseModel
{
    /** @use SdkModel<TransactionGetByTypeResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?int $count;

    #[Optional]
    public ?float $total;

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
        ?int $count = null,
        ?float $total = null,
        ?string $type = null
    ): self {
        $self = new self;

        null !== $count && $self['count'] = $count;
        null !== $total && $self['total'] = $total;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    public function withTotal(float $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
