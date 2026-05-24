<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * First period to compare.
 *
 * @phpstan-type PeriodAShape = array{end: string, start: string}
 */
final class PeriodA implements BaseModel
{
    /** @use SdkModel<PeriodAShape> */
    use SdkModel;

    /**
     * Must be a valid date. Must be a date after or equal to <code>period_a.start</code>.
     */
    #[Required]
    public string $end;

    /**
     * Must be a valid date.
     */
    #[Required]
    public string $start;

    /**
     * `new PeriodA()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PeriodA::with(end: ..., start: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PeriodA)->withEnd(...)->withStart(...)
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
     */
    public static function with(string $end, string $start): self
    {
        $self = new self;

        $self['end'] = $end;
        $self['start'] = $start;

        return $self;
    }

    /**
     * Must be a valid date. Must be a date after or equal to <code>period_a.start</code>.
     */
    public function withEnd(string $end): self
    {
        $self = clone $this;
        $self['end'] = $end;

        return $self;
    }

    /**
     * Must be a valid date.
     */
    public function withStart(string $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }
}
