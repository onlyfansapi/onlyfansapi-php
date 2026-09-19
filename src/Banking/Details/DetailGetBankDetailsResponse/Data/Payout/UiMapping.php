<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout;

use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping\Alert;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping\BtnSubmit;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping\Title;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AlertShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping\Alert
 * @phpstan-import-type BtnSubmitShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping\BtnSubmit
 * @phpstan-import-type TitleShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping\Title
 *
 * @phpstan-type UiMappingShape = array{
 *   alert?: null|Alert|AlertShape,
 *   btnSubmit?: null|BtnSubmit|BtnSubmitShape,
 *   title?: null|Title|TitleShape,
 * }
 */
final class UiMapping implements BaseModel
{
    /** @use SdkModel<UiMappingShape> */
    use SdkModel;

    #[Optional]
    public ?Alert $alert;

    #[Optional('btn_submit')]
    public ?BtnSubmit $btnSubmit;

    #[Optional]
    public ?Title $title;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Alert|AlertShape|null $alert
     * @param BtnSubmit|BtnSubmitShape|null $btnSubmit
     * @param Title|TitleShape|null $title
     */
    public static function with(
        Alert|array|null $alert = null,
        BtnSubmit|array|null $btnSubmit = null,
        Title|array|null $title = null,
    ): self {
        $self = new self;

        null !== $alert && $self['alert'] = $alert;
        null !== $btnSubmit && $self['btnSubmit'] = $btnSubmit;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * @param Alert|AlertShape $alert
     */
    public function withAlert(Alert|array $alert): self
    {
        $self = clone $this;
        $self['alert'] = $alert;

        return $self;
    }

    /**
     * @param BtnSubmit|BtnSubmitShape $btnSubmit
     */
    public function withBtnSubmit(BtnSubmit|array $btnSubmit): self
    {
        $self = clone $this;
        $self['btnSubmit'] = $btnSubmit;

        return $self;
    }

    /**
     * @param Title|TitleShape $title
     */
    public function withTitle(Title|array $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
