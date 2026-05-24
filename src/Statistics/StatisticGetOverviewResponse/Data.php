<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\StatisticGetOverviewResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Earning;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\MassMessages;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Streams;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors;

/**
 * @phpstan-import-type EarningShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Earning
 * @phpstan-import-type MassMessagesShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\MassMessages
 * @phpstan-import-type PostsShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts
 * @phpstan-import-type StreamsShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Streams
 * @phpstan-import-type VisitorsShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors
 *
 * @phpstan-type DataShape = array{
 *   earning?: null|Earning|EarningShape,
 *   massMessages?: null|MassMessages|MassMessagesShape,
 *   posts?: null|Posts|PostsShape,
 *   streams?: null|Streams|StreamsShape,
 *   visitors?: null|Visitors|VisitorsShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Earning $earning;

    #[Optional]
    public ?MassMessages $massMessages;

    #[Optional]
    public ?Posts $posts;

    #[Optional]
    public ?Streams $streams;

    #[Optional]
    public ?Visitors $visitors;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Earning|EarningShape|null $earning
     * @param MassMessages|MassMessagesShape|null $massMessages
     * @param Posts|PostsShape|null $posts
     * @param Streams|StreamsShape|null $streams
     * @param Visitors|VisitorsShape|null $visitors
     */
    public static function with(
        Earning|array|null $earning = null,
        MassMessages|array|null $massMessages = null,
        Posts|array|null $posts = null,
        Streams|array|null $streams = null,
        Visitors|array|null $visitors = null,
    ): self {
        $self = new self;

        null !== $earning && $self['earning'] = $earning;
        null !== $massMessages && $self['massMessages'] = $massMessages;
        null !== $posts && $self['posts'] = $posts;
        null !== $streams && $self['streams'] = $streams;
        null !== $visitors && $self['visitors'] = $visitors;

        return $self;
    }

    /**
     * @param Earning|EarningShape $earning
     */
    public function withEarning(Earning|array $earning): self
    {
        $self = clone $this;
        $self['earning'] = $earning;

        return $self;
    }

    /**
     * @param MassMessages|MassMessagesShape $massMessages
     */
    public function withMassMessages(MassMessages|array $massMessages): self
    {
        $self = clone $this;
        $self['massMessages'] = $massMessages;

        return $self;
    }

    /**
     * @param Posts|PostsShape $posts
     */
    public function withPosts(Posts|array $posts): self
    {
        $self = clone $this;
        $self['posts'] = $posts;

        return $self;
    }

    /**
     * @param Streams|StreamsShape $streams
     */
    public function withStreams(Streams|array $streams): self
    {
        $self = clone $this;
        $self['streams'] = $streams;

        return $self;
    }

    /**
     * @param Visitors|VisitorsShape $visitors
     */
    public function withVisitors(Visitors|array $visitors): self
    {
        $self = clone $this;
        $self['visitors'] = $visitors;

        return $self;
    }
}
