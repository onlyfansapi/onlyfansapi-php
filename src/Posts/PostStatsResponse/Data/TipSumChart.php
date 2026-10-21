<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\PostStatsResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type TipSumChartShape = array{count?: int|null, date?: string|null}
 */
final class TipSumChart implements BaseModel
{
    /** @use SdkModel<TipSumChartShape> */
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
