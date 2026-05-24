<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonAddResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   clicks?: int|null,
 *   isValid?: bool|null,
 *   label?: string|null,
 *   link?: string|null,
 *   socialMedia?: string|null,
 *   sort?: int|null,
 *   url?: string|null,
 *   username?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?int $clicks;

    #[Optional]
    public ?bool $isValid;

    #[Optional]
    public ?string $label;

    #[Optional]
    public ?string $link;

    #[Optional]
    public ?string $socialMedia;

    #[Optional]
    public ?int $sort;

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
     */
    public static function with(
        ?int $id = null,
        ?int $clicks = null,
        ?bool $isValid = null,
        ?string $label = null,
        ?string $link = null,
        ?string $socialMedia = null,
        ?int $sort = null,
        ?string $url = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $clicks && $self['clicks'] = $clicks;
        null !== $isValid && $self['isValid'] = $isValid;
        null !== $label && $self['label'] = $label;
        null !== $link && $self['link'] = $link;
        null !== $socialMedia && $self['socialMedia'] = $socialMedia;
        null !== $sort && $self['sort'] = $sort;
        null !== $url && $self['url'] = $url;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withClicks(int $clicks): self
    {
        $self = clone $this;
        $self['clicks'] = $clicks;

        return $self;
    }

    public function withIsValid(bool $isValid): self
    {
        $self = clone $this;
        $self['isValid'] = $isValid;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withLink(string $link): self
    {
        $self = clone $this;
        $self['link'] = $link;

        return $self;
    }

    public function withSocialMedia(string $socialMedia): self
    {
        $self = clone $this;
        $self['socialMedia'] = $socialMedia;

        return $self;
    }

    public function withSort(int $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

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
