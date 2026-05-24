<?php

declare(strict_types=1);

namespace Onlyfansapi\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingResponse\_Meta;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type _CacheShape = array{isCached?: bool|null, note?: string|null}
 */
final class _Cache implements BaseModel
{
    /** @use SdkModel<_CacheShape> */
    use SdkModel;

    #[Optional('is_cached')]
    public ?bool $isCached;

    #[Optional]
    public ?string $note;

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
        ?bool $isCached = null,
        ?string $note = null
    ): self {
        $self = new self;

        null !== $isCached && $self['isCached'] = $isCached;
        null !== $note && $self['note'] = $note;

        return $self;
    }

    public function withIsCached(bool $isCached): self
    {
        $self = clone $this;
        $self['isCached'] = $isCached;

        return $self;
    }

    public function withNote(string $note): self
    {
        $self = clone $this;
        $self['note'] = $note;

        return $self;
    }
}
