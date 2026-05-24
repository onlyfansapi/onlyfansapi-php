<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault\Lists\Media;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Remove one or multiple media from a list.
 *
 * @see Onlyfansapi\Services\Media\Vault\Lists\MediaService::remove()
 *
 * @phpstan-type MediaRemoveParamsShape = array{
 *   account: string, mediaIDs: list<string>
 * }
 */
final class MediaRemoveParams implements BaseModel
{
    /** @use SdkModel<MediaRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Array of media IDs to delete.
     *
     * @var list<string> $mediaIDs
     */
    #[Required('mediaIds', list: 'string')]
    public array $mediaIDs;

    /**
     * `new MediaRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaRemoveParams::with(account: ..., mediaIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaRemoveParams)->withAccount(...)->withMediaIDs(...)
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
    public static function with(string $account, array $mediaIDs): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['mediaIDs'] = $mediaIDs;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

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
