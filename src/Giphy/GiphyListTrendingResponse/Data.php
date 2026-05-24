<?php

declare(strict_types=1);

namespace Onlyfansapi\Giphy\GiphyListTrendingResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Giphy\GiphyListTrendingResponse\Data\Images;

/**
 * @phpstan-import-type ImagesShape from \Onlyfansapi\Giphy\GiphyListTrendingResponse\Data\Images
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   embedURL?: string|null,
 *   images?: null|Images|ImagesShape,
 *   rating?: string|null,
 *   slug?: string|null,
 *   title?: string|null,
 *   type?: string|null,
 *   url?: string|null,
 *   username?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('embed_url')]
    public ?string $embedURL;

    #[Optional]
    public ?Images $images;

    #[Optional]
    public ?string $rating;

    #[Optional]
    public ?string $slug;

    #[Optional]
    public ?string $title;

    #[Optional]
    public ?string $type;

    #[Optional]
    public ?string $url;

    #[Optional]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Images|ImagesShape|null $images
     */
    public static function with(
        ?string $id = null,
        ?string $embedURL = null,
        Images|array|null $images = null,
        ?string $rating = null,
        ?string $slug = null,
        ?string $title = null,
        ?string $type = null,
        ?string $url = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $embedURL && $self['embedURL'] = $embedURL;
        null !== $images && $self['images'] = $images;
        null !== $rating && $self['rating'] = $rating;
        null !== $slug && $self['slug'] = $slug;
        null !== $title && $self['title'] = $title;
        null !== $type && $self['type'] = $type;
        null !== $url && $self['url'] = $url;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEmbedURL(string $embedURL): self
    {
        $self = clone $this;
        $self['embedURL'] = $embedURL;

        return $self;
    }

    /**
     * @param Images|ImagesShape $images
     */
    public function withImages(Images|array $images): self
    {
        $self = clone $this;
        $self['images'] = $images;

        return $self;
    }

    public function withRating(string $rating): self
    {
        $self = clone $this;
        $self['rating'] = $rating;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
