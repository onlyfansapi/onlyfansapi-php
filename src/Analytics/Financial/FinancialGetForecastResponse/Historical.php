<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Financial\FinancialGetForecastResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type HistoricalShape = array{date?: string|null, value?: float|null}
 */
final class Historical implements BaseModel
{
    /** @use SdkModel<HistoricalShape> */
    use SdkModel;

    #[Optional]
    public ?string $date;

    #[Optional]
    public ?float $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $date = null, ?float $value = null): self
    {
        $self = new self;

        null !== $date && $self['date'] = $date;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withDate(string $date): self
    {
        $self = clone $this;
        $self['date'] = $date;

        return $self;
    }

    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
