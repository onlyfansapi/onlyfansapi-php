<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\Notes\NoteGetNotesResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{notes?: string|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $notes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $notes = null): self
    {
        $self = new self;

        null !== $notes && $self['notes'] = $notes;

        return $self;
    }

    public function withNotes(string $notes): self
    {
        $self = clone $this;
        $self['notes'] = $notes;

        return $self;
    }
}
