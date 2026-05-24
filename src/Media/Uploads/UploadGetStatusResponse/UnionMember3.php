<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Uploads\UploadGetStatusResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember3\Media;

/**
 * Completed POST /media/upload upload.
 *
 * @phpstan-import-type MediaShape from \Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember3\Media
 *
 * @phpstan-type UnionMember3Shape = array{
 *   creditsUsed?: int|null,
 *   media?: null|Media|MediaShape,
 *   prefixedID?: string|null,
 *   status?: string|null,
 * }
 */
final class UnionMember3 implements BaseModel
{
    /** @use SdkModel<UnionMember3Shape> */
    use SdkModel;

    #[Optional('credits_used')]
    public ?int $creditsUsed;

    #[Optional]
    public ?Media $media;

    #[Optional('prefixed_id')]
    public ?string $prefixedID;

    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Media|MediaShape|null $media
     */
    public static function with(
        ?int $creditsUsed = null,
        Media|array|null $media = null,
        ?string $prefixedID = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $creditsUsed && $self['creditsUsed'] = $creditsUsed;
        null !== $media && $self['media'] = $media;
        null !== $prefixedID && $self['prefixedID'] = $prefixedID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withCreditsUsed(int $creditsUsed): self
    {
        $self = clone $this;
        $self['creditsUsed'] = $creditsUsed;

        return $self;
    }

    /**
     * @param Media|MediaShape $media
     */
    public function withMedia(Media|array $media): self
    {
        $self = clone $this;
        $self['media'] = $media;

        return $self;
    }

    public function withPrefixedID(string $prefixedID): self
    {
        $self = clone $this;
        $self['prefixedID'] = $prefixedID;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
