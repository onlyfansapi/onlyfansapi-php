<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateResponse\Data\SmartLink;

/**
 * @phpstan-import-type SmartLinkShape from \Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackUpdateResponse\Data\SmartLink
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   conversionTypes?: list<string>|null,
 *   createdAt?: string|null,
 *   latestResponse?: string|null,
 *   smartLinkIDs?: list<string>|null,
 *   smartLinkScope?: string|null,
 *   smartLinks?: list<SmartLink|SmartLinkShape>|null,
 *   updatedAt?: string|null,
 *   url?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    /** @var list<string>|null $conversionTypes */
    #[Optional('conversion_types', list: 'string')]
    public ?array $conversionTypes;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('latest_response', nullable: true)]
    public ?string $latestResponse;

    /** @var list<string>|null $smartLinkIDs */
    #[Optional('smart_link_ids', list: 'string')]
    public ?array $smartLinkIDs;

    #[Optional('smart_link_scope')]
    public ?string $smartLinkScope;

    /** @var list<SmartLink>|null $smartLinks */
    #[Optional('smart_links', list: SmartLink::class)]
    public ?array $smartLinks;

    #[Optional('updated_at')]
    public ?string $updatedAt;

    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $conversionTypes
     * @param list<string>|null $smartLinkIDs
     * @param list<SmartLink|SmartLinkShape>|null $smartLinks
     */
    public static function with(
        ?int $id = null,
        ?array $conversionTypes = null,
        ?string $createdAt = null,
        ?string $latestResponse = null,
        ?array $smartLinkIDs = null,
        ?string $smartLinkScope = null,
        ?array $smartLinks = null,
        ?string $updatedAt = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $conversionTypes && $self['conversionTypes'] = $conversionTypes;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $latestResponse && $self['latestResponse'] = $latestResponse;
        null !== $smartLinkIDs && $self['smartLinkIDs'] = $smartLinkIDs;
        null !== $smartLinkScope && $self['smartLinkScope'] = $smartLinkScope;
        null !== $smartLinks && $self['smartLinks'] = $smartLinks;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<string> $conversionTypes
     */
    public function withConversionTypes(array $conversionTypes): self
    {
        $self = clone $this;
        $self['conversionTypes'] = $conversionTypes;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withLatestResponse(?string $latestResponse): self
    {
        $self = clone $this;
        $self['latestResponse'] = $latestResponse;

        return $self;
    }

    /**
     * @param list<string> $smartLinkIDs
     */
    public function withSmartLinkIDs(array $smartLinkIDs): self
    {
        $self = clone $this;
        $self['smartLinkIDs'] = $smartLinkIDs;

        return $self;
    }

    public function withSmartLinkScope(string $smartLinkScope): self
    {
        $self = clone $this;
        $self['smartLinkScope'] = $smartLinkScope;

        return $self;
    }

    /**
     * @param list<SmartLink|SmartLinkShape> $smartLinks
     */
    public function withSmartLinks(array $smartLinks): self
    {
        $self = clone $this;
        $self['smartLinks'] = $smartLinks;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
