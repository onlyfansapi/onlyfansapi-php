<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\Details\DetailGetLegalAndTaxStatusResponse;

use Onlyfansapi\Banking\Details\DetailGetLegalAndTaxStatusResponse\Data\Dac7;
use Onlyfansapi\Banking\Details\DetailGetLegalAndTaxStatusResponse\Data\Tax;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type Dac7Shape from \Onlyfansapi\Banking\Details\DetailGetLegalAndTaxStatusResponse\Data\Dac7
 * @phpstan-import-type TaxShape from \Onlyfansapi\Banking\Details\DetailGetLegalAndTaxStatusResponse\Data\Tax
 *
 * @phpstan-type DataShape = array{
 *   canChangePayoutType?: bool|null,
 *   canShowLegalForm?: bool|null,
 *   dac7?: null|Dac7|Dac7Shape,
 *   hideBanking?: bool|null,
 *   isRealIDImage?: bool|null,
 *   isW9Exist?: bool|null,
 *   isW9Required?: bool|null,
 *   isXxx?: bool|null,
 *   ivFailReason?: string|null,
 *   ivStatus?: string|null,
 *   needShowEditW9?: bool|null,
 *   payoutLegalApproveRejectReason?: string|null,
 *   showIvButton?: bool|null,
 *   tax?: null|Tax|TaxShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $canChangePayoutType;

    #[Optional]
    public ?bool $canShowLegalForm;

    #[Optional('DAC7')]
    public ?Dac7 $dac7;

    #[Optional]
    public ?bool $hideBanking;

    #[Optional('isRealIdImage')]
    public ?bool $isRealIDImage;

    #[Optional]
    public ?bool $isW9Exist;

    #[Optional]
    public ?bool $isW9Required;

    #[Optional('isXXX')]
    public ?bool $isXxx;

    #[Optional]
    public ?string $ivFailReason;

    #[Optional]
    public ?string $ivStatus;

    #[Optional]
    public ?bool $needShowEditW9;

    #[Optional]
    public ?string $payoutLegalApproveRejectReason;

    #[Optional]
    public ?bool $showIvButton;

    #[Optional]
    public ?Tax $tax;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Dac7|Dac7Shape|null $dac7
     * @param Tax|TaxShape|null $tax
     */
    public static function with(
        ?bool $canChangePayoutType = null,
        ?bool $canShowLegalForm = null,
        Dac7|array|null $dac7 = null,
        ?bool $hideBanking = null,
        ?bool $isRealIDImage = null,
        ?bool $isW9Exist = null,
        ?bool $isW9Required = null,
        ?bool $isXxx = null,
        ?string $ivFailReason = null,
        ?string $ivStatus = null,
        ?bool $needShowEditW9 = null,
        ?string $payoutLegalApproveRejectReason = null,
        ?bool $showIvButton = null,
        Tax|array|null $tax = null,
    ): self {
        $self = new self;

        null !== $canChangePayoutType && $self['canChangePayoutType'] = $canChangePayoutType;
        null !== $canShowLegalForm && $self['canShowLegalForm'] = $canShowLegalForm;
        null !== $dac7 && $self['dac7'] = $dac7;
        null !== $hideBanking && $self['hideBanking'] = $hideBanking;
        null !== $isRealIDImage && $self['isRealIDImage'] = $isRealIDImage;
        null !== $isW9Exist && $self['isW9Exist'] = $isW9Exist;
        null !== $isW9Required && $self['isW9Required'] = $isW9Required;
        null !== $isXxx && $self['isXxx'] = $isXxx;
        null !== $ivFailReason && $self['ivFailReason'] = $ivFailReason;
        null !== $ivStatus && $self['ivStatus'] = $ivStatus;
        null !== $needShowEditW9 && $self['needShowEditW9'] = $needShowEditW9;
        null !== $payoutLegalApproveRejectReason && $self['payoutLegalApproveRejectReason'] = $payoutLegalApproveRejectReason;
        null !== $showIvButton && $self['showIvButton'] = $showIvButton;
        null !== $tax && $self['tax'] = $tax;

        return $self;
    }

    public function withCanChangePayoutType(bool $canChangePayoutType): self
    {
        $self = clone $this;
        $self['canChangePayoutType'] = $canChangePayoutType;

        return $self;
    }

    public function withCanShowLegalForm(bool $canShowLegalForm): self
    {
        $self = clone $this;
        $self['canShowLegalForm'] = $canShowLegalForm;

        return $self;
    }

    /**
     * @param Dac7|Dac7Shape $dac7
     */
    public function withDac7(Dac7|array $dac7): self
    {
        $self = clone $this;
        $self['dac7'] = $dac7;

        return $self;
    }

    public function withHideBanking(bool $hideBanking): self
    {
        $self = clone $this;
        $self['hideBanking'] = $hideBanking;

        return $self;
    }

    public function withIsRealIDImage(bool $isRealIDImage): self
    {
        $self = clone $this;
        $self['isRealIDImage'] = $isRealIDImage;

        return $self;
    }

    public function withIsW9Exist(bool $isW9Exist): self
    {
        $self = clone $this;
        $self['isW9Exist'] = $isW9Exist;

        return $self;
    }

    public function withIsW9Required(bool $isW9Required): self
    {
        $self = clone $this;
        $self['isW9Required'] = $isW9Required;

        return $self;
    }

    public function withIsXxx(bool $isXxx): self
    {
        $self = clone $this;
        $self['isXxx'] = $isXxx;

        return $self;
    }

    public function withIvFailReason(string $ivFailReason): self
    {
        $self = clone $this;
        $self['ivFailReason'] = $ivFailReason;

        return $self;
    }

    public function withIvStatus(string $ivStatus): self
    {
        $self = clone $this;
        $self['ivStatus'] = $ivStatus;

        return $self;
    }

    public function withNeedShowEditW9(bool $needShowEditW9): self
    {
        $self = clone $this;
        $self['needShowEditW9'] = $needShowEditW9;

        return $self;
    }

    public function withPayoutLegalApproveRejectReason(
        string $payoutLegalApproveRejectReason
    ): self {
        $self = clone $this;
        $self['payoutLegalApproveRejectReason'] = $payoutLegalApproveRejectReason;

        return $self;
    }

    public function withShowIvButton(bool $showIvButton): self
    {
        $self = clone $this;
        $self['showIvButton'] = $showIvButton;

        return $self;
    }

    /**
     * @param Tax|TaxShape $tax
     */
    public function withTax(Tax|array $tax): self
    {
        $self = clone $this;
        $self['tax'] = $tax;

        return $self;
    }
}
