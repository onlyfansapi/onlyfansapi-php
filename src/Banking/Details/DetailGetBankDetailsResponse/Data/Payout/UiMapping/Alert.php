<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping;

use Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping\Alert\Text;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TextShape from \Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping\Alert\Text
 *
 * @phpstan-type AlertShape = array{
 *   class?: string|null, text?: null|Text|TextShape
 * }
 */
final class Alert implements BaseModel
{
    /** @use SdkModel<AlertShape> */
    use SdkModel;

    #[Optional]
    public ?string $class;

    #[Optional]
    public ?Text $text;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Text|TextShape|null $text
     */
    public static function with(
        ?string $class = null,
        Text|array|null $text = null
    ): self {
        $self = new self;

        null !== $class && $self['class'] = $class;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withClass(string $class): self
    {
        $self = clone $this;
        $self['class'] = $class;

        return $self;
    }

    /**
     * @param Text|TextShape $text
     */
    public function withText(Text|array $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
