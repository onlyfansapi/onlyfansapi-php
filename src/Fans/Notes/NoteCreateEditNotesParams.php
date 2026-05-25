<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\Notes;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Create or edit notes for a specific fan.
 *
 * @see OnlyFansAPI\Services\Fans\NotesService::createEditNotes()
 *
 * @phpstan-type NoteCreateEditNotesParamsShape = array{
 *   account: string, notes: string
 * }
 */
final class NoteCreateEditNotesParams implements BaseModel
{
    /** @use SdkModel<NoteCreateEditNotesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The new note value.
     */
    #[Required]
    public string $notes;

    /**
     * `new NoteCreateEditNotesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NoteCreateEditNotesParams::with(account: ..., notes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NoteCreateEditNotesParams)->withAccount(...)->withNotes(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $account, string $notes): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['notes'] = $notes;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The new note value.
     */
    public function withNotes(string $notes): self
    {
        $self = clone $this;
        $self['notes'] = $notes;

        return $self;
    }
}
