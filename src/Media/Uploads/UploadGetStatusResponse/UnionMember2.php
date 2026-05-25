<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Uploads\UploadGetStatusResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember2\Media;

/**
 * Completed POST /media/vault upload.
 *
 * @phpstan-import-type MediaShape from \OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember2\Media
 *
 * @phpstan-type UnionMember2Shape = array{
 *   creditsUsed?: int|null,
 *   media?: null|Media|MediaShape,
 *   prefixedID?: string|null,
 *   status?: string|null,
 * }
 */
final class UnionMember2 implements BaseModel
{
    /** @use SdkModel<UnionMember2Shape> */
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
