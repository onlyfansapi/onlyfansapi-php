<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaScrapeResponseShape = array{
 *   expirationDate?: string|null, temporaryURL?: string|null
 * }
 */
final class MediaScrapeResponse implements BaseModel
{
    /** @use SdkModel<MediaScrapeResponseShape> */
    use SdkModel;

    #[Optional('expiration_date')]
    public ?string $expirationDate;

    #[Optional('temporary_url')]
    public ?string $temporaryURL;

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
        ?string $expirationDate = null,
        ?string $temporaryURL = null
    ): self {
        $self = new self;

        null !== $expirationDate && $self['expirationDate'] = $expirationDate;
        null !== $temporaryURL && $self['temporaryURL'] = $temporaryURL;

        return $self;
    }

    public function withExpirationDate(string $expirationDate): self
    {
        $self = clone $this;
        $self['expirationDate'] = $expirationDate;

        return $self;
    }

    public function withTemporaryURL(string $temporaryURL): self
    {
        $self = clone $this;
        $self['temporaryURL'] = $temporaryURL;

        return $self;
    }
}
