<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\FirstName;

use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\FirstName\Oninput\Replace;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ReplaceShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\FirstName\Oninput\Replace
 *
 * @phpstan-type OninputShape = array{replace?: null|Replace|ReplaceShape}
 */
final class Oninput implements BaseModel
{
    /** @use SdkModel<OninputShape> */
    use SdkModel;

    #[Optional]
    public ?Replace $replace;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Replace|ReplaceShape|null $replace
     */
    public static function with(Replace|array|null $replace = null): self
    {
        $self = new self;

        null !== $replace && $self['replace'] = $replace;

        return $self;
    }

    /**
     * @param Replace|ReplaceShape $replace
     */
    public function withReplace(Replace|array $replace): self
    {
        $self = clone $this;
        $self['replace'] = $replace;

        return $self;
    }
}
