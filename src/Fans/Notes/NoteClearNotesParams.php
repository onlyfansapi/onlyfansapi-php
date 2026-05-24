<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\Notes;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Clear notes for a specific fan.
 *
 * @see Onlyfansapi\Services\Fans\NotesService::clearNotes()
 *
 * @phpstan-type NoteClearNotesParamsShape = array{account: string}
 */
final class NoteClearNotesParams implements BaseModel
{
    /** @use SdkModel<NoteClearNotesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new NoteClearNotesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NoteClearNotesParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NoteClearNotesParams)->withAccount(...)
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
