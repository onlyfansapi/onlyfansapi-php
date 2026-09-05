<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse\Data\Total;

/**
 * @phpstan-import-type TotalShape from \OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse\Data\Total
 *
 * @phpstan-type DataShape = array{total?: null|Total|TotalShape}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Total $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Total|TotalShape|null $total
     */
    public static function with(Total|array|null $total = null): self
    {
        $self = new self;

        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param Total|TotalShape $total
     */
    public function withTotal(Total|array $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
