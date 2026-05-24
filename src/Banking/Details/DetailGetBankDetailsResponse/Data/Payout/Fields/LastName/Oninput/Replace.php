<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\LastName\Oninput;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReplaceShape = array{flag?: string|null, pattern?: string|null}
 */
final class Replace implements BaseModel
{
    /** @use SdkModel<ReplaceShape> */
    use SdkModel;

    #[Optional]
    public ?string $flag;

    #[Optional]
    public ?string $pattern;

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
        ?string $flag = null,
        ?string $pattern = null
    ): self {
        $self = new self;

        null !== $flag && $self['flag'] = $flag;
        null !== $pattern && $self['pattern'] = $pattern;

        return $self;
    }

    public function withFlag(string $flag): self
    {
        $self = clone $this;
        $self['flag'] = $flag;

        return $self;
    }

    public function withPattern(string $pattern): self
    {
        $self = clone $this;
        $self['pattern'] = $pattern;

        return $self;
    }
}
