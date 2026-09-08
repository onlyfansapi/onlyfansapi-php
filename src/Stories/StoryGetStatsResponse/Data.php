<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryGetStatsResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryCommentChart;
use OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryLikeChart;
use OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryLookChart;
use OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryTipChart;
use OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryTipSumChart;

/**
 * @phpstan-import-type StoryCommentChartShape from \OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryCommentChart
 * @phpstan-import-type StoryLikeChartShape from \OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryLikeChart
 * @phpstan-import-type StoryLookChartShape from \OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryLookChart
 * @phpstan-import-type StoryTipChartShape from \OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryTipChart
 * @phpstan-import-type StoryTipSumChartShape from \OnlyFansAPI\Stories\StoryGetStatsResponse\Data\StoryTipSumChart
 *
 * @phpstan-type DataShape = array{
 *   createdAt?: string|null,
 *   storyCommentAll?: list<string>|null,
 *   storyCommentChart?: list<StoryCommentChart|StoryCommentChartShape>|null,
 *   storyCommentCount?: int|null,
 *   storyLikeAll?: list<string>|null,
 *   storyLikeChart?: list<StoryLikeChart|StoryLikeChartShape>|null,
 *   storyLikeCount?: int|null,
 *   storyLookAll?: list<string>|null,
 *   storyLookChart?: list<StoryLookChart|StoryLookChartShape>|null,
 *   storyLookCount?: string|null,
 *   storyTipAll?: list<string>|null,
 *   storyTipChart?: list<StoryTipChart|StoryTipChartShape>|null,
 *   storyTipCount?: int|null,
 *   storyTipSum?: int|null,
 *   storyTipSumChart?: list<StoryTipSumChart|StoryTipSumChartShape>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $createdAt;

    /** @var list<string>|null $storyCommentAll */
    #[Optional(list: 'string')]
    public ?array $storyCommentAll;

    /** @var list<StoryCommentChart>|null $storyCommentChart */
    #[Optional(list: StoryCommentChart::class)]
    public ?array $storyCommentChart;

    #[Optional]
    public ?int $storyCommentCount;

    /** @var list<string>|null $storyLikeAll */
    #[Optional(list: 'string')]
    public ?array $storyLikeAll;

    /** @var list<StoryLikeChart>|null $storyLikeChart */
    #[Optional(list: StoryLikeChart::class)]
    public ?array $storyLikeChart;

    #[Optional]
    public ?int $storyLikeCount;

    /** @var list<string>|null $storyLookAll */
    #[Optional(list: 'string')]
    public ?array $storyLookAll;

    /** @var list<StoryLookChart>|null $storyLookChart */
    #[Optional(list: StoryLookChart::class)]
    public ?array $storyLookChart;

    #[Optional]
    public ?string $storyLookCount;

    /** @var list<string>|null $storyTipAll */
    #[Optional(list: 'string')]
    public ?array $storyTipAll;

    /** @var list<StoryTipChart>|null $storyTipChart */
    #[Optional(list: StoryTipChart::class)]
    public ?array $storyTipChart;

    #[Optional]
    public ?int $storyTipCount;

    #[Optional]
    public ?int $storyTipSum;

    /** @var list<StoryTipSumChart>|null $storyTipSumChart */
    #[Optional(list: StoryTipSumChart::class)]
    public ?array $storyTipSumChart;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $storyCommentAll
     * @param list<StoryCommentChart|StoryCommentChartShape>|null $storyCommentChart
     * @param list<string>|null $storyLikeAll
     * @param list<StoryLikeChart|StoryLikeChartShape>|null $storyLikeChart
     * @param list<string>|null $storyLookAll
     * @param list<StoryLookChart|StoryLookChartShape>|null $storyLookChart
     * @param list<string>|null $storyTipAll
     * @param list<StoryTipChart|StoryTipChartShape>|null $storyTipChart
     * @param list<StoryTipSumChart|StoryTipSumChartShape>|null $storyTipSumChart
     */
    public static function with(
        ?string $createdAt = null,
        ?array $storyCommentAll = null,
        ?array $storyCommentChart = null,
        ?int $storyCommentCount = null,
        ?array $storyLikeAll = null,
        ?array $storyLikeChart = null,
        ?int $storyLikeCount = null,
        ?array $storyLookAll = null,
        ?array $storyLookChart = null,
        ?string $storyLookCount = null,
        ?array $storyTipAll = null,
        ?array $storyTipChart = null,
        ?int $storyTipCount = null,
        ?int $storyTipSum = null,
        ?array $storyTipSumChart = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $storyCommentAll && $self['storyCommentAll'] = $storyCommentAll;
        null !== $storyCommentChart && $self['storyCommentChart'] = $storyCommentChart;
        null !== $storyCommentCount && $self['storyCommentCount'] = $storyCommentCount;
        null !== $storyLikeAll && $self['storyLikeAll'] = $storyLikeAll;
        null !== $storyLikeChart && $self['storyLikeChart'] = $storyLikeChart;
        null !== $storyLikeCount && $self['storyLikeCount'] = $storyLikeCount;
        null !== $storyLookAll && $self['storyLookAll'] = $storyLookAll;
        null !== $storyLookChart && $self['storyLookChart'] = $storyLookChart;
        null !== $storyLookCount && $self['storyLookCount'] = $storyLookCount;
        null !== $storyTipAll && $self['storyTipAll'] = $storyTipAll;
        null !== $storyTipChart && $self['storyTipChart'] = $storyTipChart;
        null !== $storyTipCount && $self['storyTipCount'] = $storyTipCount;
        null !== $storyTipSum && $self['storyTipSum'] = $storyTipSum;
        null !== $storyTipSumChart && $self['storyTipSumChart'] = $storyTipSumChart;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<string> $storyCommentAll
     */
    public function withStoryCommentAll(array $storyCommentAll): self
    {
        $self = clone $this;
        $self['storyCommentAll'] = $storyCommentAll;

        return $self;
    }

    /**
     * @param list<StoryCommentChart|StoryCommentChartShape> $storyCommentChart
     */
    public function withStoryCommentChart(array $storyCommentChart): self
    {
        $self = clone $this;
        $self['storyCommentChart'] = $storyCommentChart;

        return $self;
    }

    public function withStoryCommentCount(int $storyCommentCount): self
    {
        $self = clone $this;
        $self['storyCommentCount'] = $storyCommentCount;

        return $self;
    }

    /**
     * @param list<string> $storyLikeAll
     */
    public function withStoryLikeAll(array $storyLikeAll): self
    {
        $self = clone $this;
        $self['storyLikeAll'] = $storyLikeAll;

        return $self;
    }

    /**
     * @param list<StoryLikeChart|StoryLikeChartShape> $storyLikeChart
     */
    public function withStoryLikeChart(array $storyLikeChart): self
    {
        $self = clone $this;
        $self['storyLikeChart'] = $storyLikeChart;

        return $self;
    }

    public function withStoryLikeCount(int $storyLikeCount): self
    {
        $self = clone $this;
        $self['storyLikeCount'] = $storyLikeCount;

        return $self;
    }

    /**
     * @param list<string> $storyLookAll
     */
    public function withStoryLookAll(array $storyLookAll): self
    {
        $self = clone $this;
        $self['storyLookAll'] = $storyLookAll;

        return $self;
    }

    /**
     * @param list<StoryLookChart|StoryLookChartShape> $storyLookChart
     */
    public function withStoryLookChart(array $storyLookChart): self
    {
        $self = clone $this;
        $self['storyLookChart'] = $storyLookChart;

        return $self;
    }

    public function withStoryLookCount(string $storyLookCount): self
    {
        $self = clone $this;
        $self['storyLookCount'] = $storyLookCount;

        return $self;
    }

    /**
     * @param list<string> $storyTipAll
     */
    public function withStoryTipAll(array $storyTipAll): self
    {
        $self = clone $this;
        $self['storyTipAll'] = $storyTipAll;

        return $self;
    }

    /**
     * @param list<StoryTipChart|StoryTipChartShape> $storyTipChart
     */
    public function withStoryTipChart(array $storyTipChart): self
    {
        $self = clone $this;
        $self['storyTipChart'] = $storyTipChart;

        return $self;
    }

    public function withStoryTipCount(int $storyTipCount): self
    {
        $self = clone $this;
        $self['storyTipCount'] = $storyTipCount;

        return $self;
    }

    public function withStoryTipSum(int $storyTipSum): self
    {
        $self = clone $this;
        $self['storyTipSum'] = $storyTipSum;

        return $self;
    }

    /**
     * @param list<StoryTipSumChart|StoryTipSumChartShape> $storyTipSumChart
     */
    public function withStoryTipSumChart(array $storyTipSumChart): self
    {
        $self = clone $this;
        $self['storyTipSumChart'] = $storyTipSumChart;

        return $self;
    }
}
