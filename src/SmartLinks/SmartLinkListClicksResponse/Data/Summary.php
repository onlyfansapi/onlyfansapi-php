<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListClicksResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryShape = array{clicksTotal?: int|null}
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    #[Optional('clicks_total')]
    public ?int $clicksTotal;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $clicksTotal = null): self
    {
        $self = new self;

        null !== $clicksTotal && $self['clicksTotal'] = $clicksTotal;

        return $self;
    }

    public function withClicksTotal(int $clicksTotal): self
    {
        $self = clone $this;
        $self['clicksTotal'] = $clicksTotal;

        return $self;
    }
}
