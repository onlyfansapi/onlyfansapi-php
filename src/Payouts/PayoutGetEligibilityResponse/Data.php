<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutGetEligibilityResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   canReceiveManualPayout?: bool|null,
 *   isVerifiedReason?: bool|null,
 *   needUpdateBanking?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $canReceiveManualPayout;

    #[Optional]
    public ?bool $isVerifiedReason;

    #[Optional]
    public ?bool $needUpdateBanking;

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
        ?bool $canReceiveManualPayout = null,
        ?bool $isVerifiedReason = null,
        ?bool $needUpdateBanking = null,
    ): self {
        $self = new self;

        null !== $canReceiveManualPayout && $self['canReceiveManualPayout'] = $canReceiveManualPayout;
        null !== $isVerifiedReason && $self['isVerifiedReason'] = $isVerifiedReason;
        null !== $needUpdateBanking && $self['needUpdateBanking'] = $needUpdateBanking;

        return $self;
    }

    public function withCanReceiveManualPayout(
        bool $canReceiveManualPayout
    ): self {
        $self = clone $this;
        $self['canReceiveManualPayout'] = $canReceiveManualPayout;

        return $self;
    }

    public function withIsVerifiedReason(bool $isVerifiedReason): self
    {
        $self = clone $this;
        $self['isVerifiedReason'] = $isVerifiedReason;

        return $self;
    }

    public function withNeedUpdateBanking(bool $needUpdateBanking): self
    {
        $self = clone $this;
        $self['needUpdateBanking'] = $needUpdateBanking;

        return $self;
    }
}
