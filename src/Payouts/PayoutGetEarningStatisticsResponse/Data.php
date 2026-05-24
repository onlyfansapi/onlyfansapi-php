<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_;

/**
 * @phpstan-import-type ListShape from \Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_
 *
 * @phpstan-type DataShape = array{list?: null|List_|ListShape}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?List_ $list;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param List_|ListShape|null $list
     */
    public static function with(List_|array|null $list = null): self
    {
        $self = new self;

        null !== $list && $self['list'] = $list;

        return $self;
    }

    /**
     * @param List_|ListShape $list
     */
    public function withList(List_|array $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }
}
