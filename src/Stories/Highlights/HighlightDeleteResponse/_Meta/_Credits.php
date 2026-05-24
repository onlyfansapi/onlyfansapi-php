<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\Highlights\HighlightDeleteResponse\_Meta;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type _CreditsShape = array{
 *   balance?: int|null, note?: string|null, used?: int|null
 * }
 */
final class _Credits implements BaseModel
{
    /** @use SdkModel<_CreditsShape> */
    use SdkModel;

    #[Optional]
    public ?int $balance;

    #[Optional]
    public ?string $note;

    #[Optional]
    public ?int $used;

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
        ?int $balance = null,
        ?string $note = null,
        ?int $used = null
    ): self {
        $self = new self;

        null !== $balance && $self['balance'] = $balance;
        null !== $note && $self['note'] = $note;
        null !== $used && $self['used'] = $used;

        return $self;
    }

    public function withBalance(int $balance): self
    {
        $self = clone $this;
        $self['balance'] = $balance;

        return $self;
    }

    public function withNote(string $note): self
    {
        $self = clone $this;
        $self['note'] = $note;

        return $self;
    }

    public function withUsed(int $used): self
    {
        $self = clone $this;
        $self['used'] = $used;

        return $self;
    }
}
