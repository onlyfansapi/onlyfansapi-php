<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months\_1735689661\Subscribe;
use Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months\_1735689661\Tip;

/**
 * @phpstan-import-type SubscribeShape from \Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months\_1735689661\Subscribe
 * @phpstan-import-type TipShape from \Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months\_1735689661\Tip
 *
 * @phpstan-type _1735689661Shape = array{
 *   subscribes?: list<Subscribe|SubscribeShape>|null,
 *   tips?: list<Tip|TipShape>|null,
 *   totalGross?: int|null,
 *   totalNet?: int|null,
 * }
 */
final class _1735689661 implements BaseModel
{
    /** @use SdkModel<_1735689661Shape> */
    use SdkModel;

    /** @var list<Subscribe>|null $subscribes */
    #[Optional(list: Subscribe::class)]
    public ?array $subscribes;

    /** @var list<Tip>|null $tips */
    #[Optional(list: Tip::class)]
    public ?array $tips;

    #[Optional('total_gross')]
    public ?int $totalGross;

    #[Optional('total_net')]
    public ?int $totalNet;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Subscribe|SubscribeShape>|null $subscribes
     * @param list<Tip|TipShape>|null $tips
     */
    public static function with(
        ?array $subscribes = null,
        ?array $tips = null,
        ?int $totalGross = null,
        ?int $totalNet = null,
    ): self {
        $self = new self;

        null !== $subscribes && $self['subscribes'] = $subscribes;
        null !== $tips && $self['tips'] = $tips;
        null !== $totalGross && $self['totalGross'] = $totalGross;
        null !== $totalNet && $self['totalNet'] = $totalNet;

        return $self;
    }

    /**
     * @param list<Subscribe|SubscribeShape> $subscribes
     */
    public function withSubscribes(array $subscribes): self
    {
        $self = clone $this;
        $self['subscribes'] = $subscribes;

        return $self;
    }

    /**
     * @param list<Tip|TipShape> $tips
     */
    public function withTips(array $tips): self
    {
        $self = clone $this;
        $self['tips'] = $tips;

        return $self;
    }

    public function withTotalGross(int $totalGross): self
    {
        $self = clone $this;
        $self['totalGross'] = $totalGross;

        return $self;
    }

    public function withTotalNet(int $totalNet): self
    {
        $self = clone $this;
        $self['totalNet'] = $totalNet;

        return $self;
    }
}
