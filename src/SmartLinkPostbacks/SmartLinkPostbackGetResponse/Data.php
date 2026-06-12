<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackGetResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackGetResponse\Data\Header;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackGetResponse\Data\SmartLink;

/**
 * @phpstan-import-type HeaderShape from \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackGetResponse\Data\Header
 * @phpstan-import-type SmartLinkShape from \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackGetResponse\Data\SmartLink
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   body?: string|null,
 *   conversionTypes?: list<string>|null,
 *   createdAt?: string|null,
 *   headers?: list<Header|HeaderShape>|null,
 *   httpMethod?: string|null,
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

    #[Optional]
    public ?string $body;

    /** @var list<string>|null $conversionTypes */
    #[Optional('conversion_types', list: 'string')]
    public ?array $conversionTypes;

    #[Optional('created_at')]
    public ?string $createdAt;

    /** @var list<Header>|null $headers */
    #[Optional(list: Header::class)]
    public ?array $headers;

    #[Optional('http_method')]
    public ?string $httpMethod;

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
     * @param list<Header|HeaderShape>|null $headers
     * @param list<string>|null $smartLinkIDs
     * @param list<SmartLink|SmartLinkShape>|null $smartLinks
     */
    public static function with(
        ?int $id = null,
        ?string $body = null,
        ?array $conversionTypes = null,
        ?string $createdAt = null,
        ?array $headers = null,
        ?string $httpMethod = null,
        ?string $latestResponse = null,
        ?array $smartLinkIDs = null,
        ?string $smartLinkScope = null,
        ?array $smartLinks = null,
        ?string $updatedAt = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $body && $self['body'] = $body;
        null !== $conversionTypes && $self['conversionTypes'] = $conversionTypes;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $headers && $self['headers'] = $headers;
        null !== $httpMethod && $self['httpMethod'] = $httpMethod;
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

    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

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

    /**
     * @param list<Header|HeaderShape> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    public function withHTTPMethod(string $httpMethod): self
    {
        $self = clone $this;
        $self['httpMethod'] = $httpMethod;

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
