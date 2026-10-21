<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\Notes;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Retrieve notes for a specific fan.
 *
 * @see OnlyFansAPI\Services\Fans\NotesService::getNotes()
 *
 * @phpstan-type NoteGetNotesParamsShape = array{account: string}
 */
final class NoteGetNotesParams implements BaseModel
{
    /** @use SdkModel<NoteGetNotesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new NoteGetNotesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NoteGetNotesParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NoteGetNotesParams)->withAccount(...)
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
    public static function with(string $account): self
    {
        $self = new self;

        $self['account'] = $account;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }
}
