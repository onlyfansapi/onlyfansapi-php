<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Statements\StatementGetEarningsResponse\Data\Total;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChartCountShape = array{count?: int|null, date?: string|null}
 */
final class ChartCount implements BaseModel
{
    /** @use SdkModel<ChartCountShape> */
    use SdkModel;

    #[Optional]
    public ?int $count;

    #[Optional]
    public ?string $date;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $count = null, ?string $date = null): self
    {
        $self = new self;

        null !== $count && $self['count'] = $count;
        null !== $date && $self['date'] = $date;

        return $self;
    }

    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    public function withDate(string $date): self
    {
        $self = clone $this;
        $self['date'] = $date;

        return $self;
    }
}
