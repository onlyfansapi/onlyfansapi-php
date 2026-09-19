<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\PostArchiveResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Posts\PostArchiveResponse\Data\Counters;
use OnlyFansAPI\Posts\PostArchiveResponse\Data\LabelState;

/**
 * @phpstan-import-type CountersShape from \OnlyFansAPI\Posts\PostArchiveResponse\Data\Counters
 * @phpstan-import-type LabelStateShape from \OnlyFansAPI\Posts\PostArchiveResponse\Data\LabelState
 *
 * @phpstan-type DataShape = array{
 *   counters?: null|Counters|CountersShape,
 *   labelStates?: list<LabelState|LabelStateShape>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Counters $counters;

    /** @var list<LabelState>|null $labelStates */
    #[Optional(list: LabelState::class)]
    public ?array $labelStates;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Counters|CountersShape|null $counters
     * @param list<LabelState|LabelStateShape>|null $labelStates
     */
    public static function with(
        Counters|array|null $counters = null,
        ?array $labelStates = null
    ): self {
        $self = new self;

        null !== $counters && $self['counters'] = $counters;
        null !== $labelStates && $self['labelStates'] = $labelStates;

        return $self;
    }

    /**
     * @param Counters|CountersShape $counters
     */
    public function withCounters(Counters|array $counters): self
    {
        $self = clone $this;
        $self['counters'] = $counters;

        return $self;
    }

    /**
     * @param list<LabelState|LabelStateShape> $labelStates
     */
    public function withLabelStates(array $labelStates): self
    {
        $self = clone $this;
        $self['labelStates'] = $labelStates;

        return $self;
    }
}
