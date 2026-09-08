<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\PostStatsResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Posts\PostStatsResponse\Data\CommentChart;
use OnlyFansAPI\Posts\PostStatsResponse\Data\LikeChart;
use OnlyFansAPI\Posts\PostStatsResponse\Data\LookChart;
use OnlyFansAPI\Posts\PostStatsResponse\Data\PurchasesChart;
use OnlyFansAPI\Posts\PostStatsResponse\Data\TipChart;
use OnlyFansAPI\Posts\PostStatsResponse\Data\TipSumChart;
use OnlyFansAPI\Posts\PostStatsResponse\Data\UniqueLookChart;

/**
 * @phpstan-import-type CommentChartShape from \OnlyFansAPI\Posts\PostStatsResponse\Data\CommentChart
 * @phpstan-import-type LikeChartShape from \OnlyFansAPI\Posts\PostStatsResponse\Data\LikeChart
 * @phpstan-import-type LookChartShape from \OnlyFansAPI\Posts\PostStatsResponse\Data\LookChart
 * @phpstan-import-type PurchasesChartShape from \OnlyFansAPI\Posts\PostStatsResponse\Data\PurchasesChart
 * @phpstan-import-type TipChartShape from \OnlyFansAPI\Posts\PostStatsResponse\Data\TipChart
 * @phpstan-import-type TipSumChartShape from \OnlyFansAPI\Posts\PostStatsResponse\Data\TipSumChart
 * @phpstan-import-type UniqueLookChartShape from \OnlyFansAPI\Posts\PostStatsResponse\Data\UniqueLookChart
 *
 * @phpstan-type DataShape = array{
 *   commentChart?: list<CommentChart|CommentChartShape>|null,
 *   commentCount?: int|null,
 *   hasStats?: bool|null,
 *   hasVideo?: bool|null,
 *   isAvailable?: bool|null,
 *   likeChart?: list<LikeChart|LikeChartShape>|null,
 *   likeCount?: int|null,
 *   lookChart?: list<LookChart|LookChartShape>|null,
 *   lookCount?: int|null,
 *   lookDuration?: int|null,
 *   lookDurationAverage?: int|null,
 *   purchasedCount?: int|null,
 *   purchasedSumm?: int|null,
 *   purchasesChart?: list<PurchasesChart|PurchasesChartShape>|null,
 *   tipChart?: list<TipChart|TipChartShape>|null,
 *   tipCount?: int|null,
 *   tipSum?: int|null,
 *   tipSumChart?: list<TipSumChart|TipSumChartShape>|null,
 *   uniqueLookChart?: list<UniqueLookChart|UniqueLookChartShape>|null,
 *   uniqueLookCount?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<CommentChart>|null $commentChart */
    #[Optional(list: CommentChart::class)]
    public ?array $commentChart;

    #[Optional]
    public ?int $commentCount;

    #[Optional]
    public ?bool $hasStats;

    #[Optional]
    public ?bool $hasVideo;

    #[Optional]
    public ?bool $isAvailable;

    /** @var list<LikeChart>|null $likeChart */
    #[Optional(list: LikeChart::class)]
    public ?array $likeChart;

    #[Optional]
    public ?int $likeCount;

    /** @var list<LookChart>|null $lookChart */
    #[Optional(list: LookChart::class)]
    public ?array $lookChart;

    #[Optional]
    public ?int $lookCount;

    #[Optional]
    public ?int $lookDuration;

    #[Optional]
    public ?int $lookDurationAverage;

    #[Optional]
    public ?int $purchasedCount;

    #[Optional]
    public ?int $purchasedSumm;

    /** @var list<PurchasesChart>|null $purchasesChart */
    #[Optional(list: PurchasesChart::class)]
    public ?array $purchasesChart;

    /** @var list<TipChart>|null $tipChart */
    #[Optional(list: TipChart::class)]
    public ?array $tipChart;

    #[Optional]
    public ?int $tipCount;

    #[Optional]
    public ?int $tipSum;

    /** @var list<TipSumChart>|null $tipSumChart */
    #[Optional(list: TipSumChart::class)]
    public ?array $tipSumChart;

    /** @var list<UniqueLookChart>|null $uniqueLookChart */
    #[Optional(list: UniqueLookChart::class)]
    public ?array $uniqueLookChart;

    #[Optional]
    public ?int $uniqueLookCount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CommentChart|CommentChartShape>|null $commentChart
     * @param list<LikeChart|LikeChartShape>|null $likeChart
     * @param list<LookChart|LookChartShape>|null $lookChart
     * @param list<PurchasesChart|PurchasesChartShape>|null $purchasesChart
     * @param list<TipChart|TipChartShape>|null $tipChart
     * @param list<TipSumChart|TipSumChartShape>|null $tipSumChart
     * @param list<UniqueLookChart|UniqueLookChartShape>|null $uniqueLookChart
     */
    public static function with(
        ?array $commentChart = null,
        ?int $commentCount = null,
        ?bool $hasStats = null,
        ?bool $hasVideo = null,
        ?bool $isAvailable = null,
        ?array $likeChart = null,
        ?int $likeCount = null,
        ?array $lookChart = null,
        ?int $lookCount = null,
        ?int $lookDuration = null,
        ?int $lookDurationAverage = null,
        ?int $purchasedCount = null,
        ?int $purchasedSumm = null,
        ?array $purchasesChart = null,
        ?array $tipChart = null,
        ?int $tipCount = null,
        ?int $tipSum = null,
        ?array $tipSumChart = null,
        ?array $uniqueLookChart = null,
        ?int $uniqueLookCount = null,
    ): self {
        $self = new self;

        null !== $commentChart && $self['commentChart'] = $commentChart;
        null !== $commentCount && $self['commentCount'] = $commentCount;
        null !== $hasStats && $self['hasStats'] = $hasStats;
        null !== $hasVideo && $self['hasVideo'] = $hasVideo;
        null !== $isAvailable && $self['isAvailable'] = $isAvailable;
        null !== $likeChart && $self['likeChart'] = $likeChart;
        null !== $likeCount && $self['likeCount'] = $likeCount;
        null !== $lookChart && $self['lookChart'] = $lookChart;
        null !== $lookCount && $self['lookCount'] = $lookCount;
        null !== $lookDuration && $self['lookDuration'] = $lookDuration;
        null !== $lookDurationAverage && $self['lookDurationAverage'] = $lookDurationAverage;
        null !== $purchasedCount && $self['purchasedCount'] = $purchasedCount;
        null !== $purchasedSumm && $self['purchasedSumm'] = $purchasedSumm;
        null !== $purchasesChart && $self['purchasesChart'] = $purchasesChart;
        null !== $tipChart && $self['tipChart'] = $tipChart;
        null !== $tipCount && $self['tipCount'] = $tipCount;
        null !== $tipSum && $self['tipSum'] = $tipSum;
        null !== $tipSumChart && $self['tipSumChart'] = $tipSumChart;
        null !== $uniqueLookChart && $self['uniqueLookChart'] = $uniqueLookChart;
        null !== $uniqueLookCount && $self['uniqueLookCount'] = $uniqueLookCount;

        return $self;
    }

    /**
     * @param list<CommentChart|CommentChartShape> $commentChart
     */
    public function withCommentChart(array $commentChart): self
    {
        $self = clone $this;
        $self['commentChart'] = $commentChart;

        return $self;
    }

    public function withCommentCount(int $commentCount): self
    {
        $self = clone $this;
        $self['commentCount'] = $commentCount;

        return $self;
    }

    public function withHasStats(bool $hasStats): self
    {
        $self = clone $this;
        $self['hasStats'] = $hasStats;

        return $self;
    }

    public function withHasVideo(bool $hasVideo): self
    {
        $self = clone $this;
        $self['hasVideo'] = $hasVideo;

        return $self;
    }

    public function withIsAvailable(bool $isAvailable): self
    {
        $self = clone $this;
        $self['isAvailable'] = $isAvailable;

        return $self;
    }

    /**
     * @param list<LikeChart|LikeChartShape> $likeChart
     */
    public function withLikeChart(array $likeChart): self
    {
        $self = clone $this;
        $self['likeChart'] = $likeChart;

        return $self;
    }

    public function withLikeCount(int $likeCount): self
    {
        $self = clone $this;
        $self['likeCount'] = $likeCount;

        return $self;
    }

    /**
     * @param list<LookChart|LookChartShape> $lookChart
     */
    public function withLookChart(array $lookChart): self
    {
        $self = clone $this;
        $self['lookChart'] = $lookChart;

        return $self;
    }

    public function withLookCount(int $lookCount): self
    {
        $self = clone $this;
        $self['lookCount'] = $lookCount;

        return $self;
    }

    public function withLookDuration(int $lookDuration): self
    {
        $self = clone $this;
        $self['lookDuration'] = $lookDuration;

        return $self;
    }

    public function withLookDurationAverage(int $lookDurationAverage): self
    {
        $self = clone $this;
        $self['lookDurationAverage'] = $lookDurationAverage;

        return $self;
    }

    public function withPurchasedCount(int $purchasedCount): self
    {
        $self = clone $this;
        $self['purchasedCount'] = $purchasedCount;

        return $self;
    }

    public function withPurchasedSumm(int $purchasedSumm): self
    {
        $self = clone $this;
        $self['purchasedSumm'] = $purchasedSumm;

        return $self;
    }

    /**
     * @param list<PurchasesChart|PurchasesChartShape> $purchasesChart
     */
    public function withPurchasesChart(array $purchasesChart): self
    {
        $self = clone $this;
        $self['purchasesChart'] = $purchasesChart;

        return $self;
    }

    /**
     * @param list<TipChart|TipChartShape> $tipChart
     */
    public function withTipChart(array $tipChart): self
    {
        $self = clone $this;
        $self['tipChart'] = $tipChart;

        return $self;
    }

    public function withTipCount(int $tipCount): self
    {
        $self = clone $this;
        $self['tipCount'] = $tipCount;

        return $self;
    }

    public function withTipSum(int $tipSum): self
    {
        $self = clone $this;
        $self['tipSum'] = $tipSum;

        return $self;
    }

    /**
     * @param list<TipSumChart|TipSumChartShape> $tipSumChart
     */
    public function withTipSumChart(array $tipSumChart): self
    {
        $self = clone $this;
        $self['tipSumChart'] = $tipSumChart;

        return $self;
    }

    /**
     * @param list<UniqueLookChart|UniqueLookChartShape> $uniqueLookChart
     */
    public function withUniqueLookChart(array $uniqueLookChart): self
    {
        $self = clone $this;
        $self['uniqueLookChart'] = $uniqueLookChart;

        return $self;
    }

    public function withUniqueLookCount(int $uniqueLookCount): self
    {
        $self = clone $this;
        $self['uniqueLookCount'] = $uniqueLookCount;

        return $self;
    }
}
