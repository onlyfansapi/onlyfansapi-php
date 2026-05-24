<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkListFansResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryShape = array{
 *   fansTotal?: int|null,
 *   fansWith3PlusMessagesTotal?: int|null,
 *   revenueNetTotal?: int|null,
 *   tipsNetTotal?: int|null,
 * }
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    #[Optional('fans_total')]
    public ?int $fansTotal;

    #[Optional('fans_with_3_plus_messages_total')]
    public ?int $fansWith3PlusMessagesTotal;

    #[Optional('revenue_net_total')]
    public ?int $revenueNetTotal;

    #[Optional('tips_net_total')]
    public ?int $tipsNetTotal;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $fansTotal = null,
        ?int $fansWith3PlusMessagesTotal = null,
        ?int $revenueNetTotal = null,
        ?int $tipsNetTotal = null,
    ): self {
        $self = new self;

        null !== $fansTotal && $self['fansTotal'] = $fansTotal;
        null !== $fansWith3PlusMessagesTotal && $self['fansWith3PlusMessagesTotal'] = $fansWith3PlusMessagesTotal;
        null !== $revenueNetTotal && $self['revenueNetTotal'] = $revenueNetTotal;
        null !== $tipsNetTotal && $self['tipsNetTotal'] = $tipsNetTotal;

        return $self;
    }

    public function withFansTotal(int $fansTotal): self
    {
        $self = clone $this;
        $self['fansTotal'] = $fansTotal;

        return $self;
    }

    public function withFansWith3PlusMessagesTotal(
        int $fansWith3PlusMessagesTotal
    ): self {
        $self = clone $this;
        $self['fansWith3PlusMessagesTotal'] = $fansWith3PlusMessagesTotal;

        return $self;
    }

    public function withRevenueNetTotal(int $revenueNetTotal): self
    {
        $self = clone $this;
        $self['revenueNetTotal'] = $revenueNetTotal;

        return $self;
    }

    public function withTipsNetTotal(int $tipsNetTotal): self
    {
        $self = clone $this;
        $self['tipsNetTotal'] = $tipsNetTotal;

        return $self;
    }
}
