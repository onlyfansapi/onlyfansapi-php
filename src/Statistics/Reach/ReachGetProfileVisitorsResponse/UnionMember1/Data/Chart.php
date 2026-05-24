<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data\Chart\Duration;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data\Chart\Visitor;

/**
 * @phpstan-import-type DurationShape from \Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data\Chart\Duration
 * @phpstan-import-type VisitorShape from \Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data\Chart\Visitor
 *
 * @phpstan-type ChartShape = array{
 *   duration?: list<Duration|DurationShape>|null,
 *   visitors?: list<Visitor|VisitorShape>|null,
 * }
 */
final class Chart implements BaseModel
{
    /** @use SdkModel<ChartShape> */
    use SdkModel;

    /** @var list<Duration>|null $duration */
    #[Optional(list: Duration::class)]
    public ?array $duration;

    /** @var list<Visitor>|null $visitors */
    #[Optional(list: Visitor::class)]
    public ?array $visitors;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Duration|DurationShape>|null $duration
     * @param list<Visitor|VisitorShape>|null $visitors
     */
    public static function with(
        ?array $duration = null,
        ?array $visitors = null
    ): self {
        $self = new self;

        null !== $duration && $self['duration'] = $duration;
        null !== $visitors && $self['visitors'] = $visitors;

        return $self;
    }

    /**
     * @param list<Duration|DurationShape> $duration
     */
    public function withDuration(array $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * @param list<Visitor|VisitorShape> $visitors
     */
    public function withVisitors(array $visitors): self
    {
        $self = clone $this;
        $self['visitors'] = $visitors;

        return $self;
    }
}
