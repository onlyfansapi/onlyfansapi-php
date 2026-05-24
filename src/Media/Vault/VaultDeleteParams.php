<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Delete one or multiple media from your vault.
 *
 * @see Onlyfansapi\Services\Media\VaultService::delete()
 *
 * @phpstan-type VaultDeleteParamsShape = array{mediaIDs: list<string>}
 */
final class VaultDeleteParams implements BaseModel
{
    /** @use SdkModel<VaultDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of media IDs to delete.
     *
     * @var list<string> $mediaIDs
     */
    #[Required('mediaIds', list: 'string')]
    public array $mediaIDs;

    /**
     * `new VaultDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VaultDeleteParams::with(mediaIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VaultDeleteParams)->withMediaIDs(...)
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
     *
     * @param list<string> $mediaIDs
     */
    public static function with(array $mediaIDs): self
    {
        $self = new self;

        $self['mediaIDs'] = $mediaIDs;

        return $self;
    }

    /**
     * Array of media IDs to delete.
     *
     * @param list<string> $mediaIDs
     */
    public function withMediaIDs(array $mediaIDs): self
    {
        $self = clone $this;
        $self['mediaIDs'] = $mediaIDs;

        return $self;
    }
}
