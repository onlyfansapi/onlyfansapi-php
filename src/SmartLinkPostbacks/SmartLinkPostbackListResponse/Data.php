<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse\Data\Header;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse\Data\LatestResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse\Data\SmartLink;

/**
 * @phpstan-import-type HeaderShape from \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse\Data\Header
 * @phpstan-import-type LatestResponseShape from \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse\Data\LatestResponse
 * @phpstan-import-type SmartLinkShape from \OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse\Data\SmartLink
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   body?: string|null,
 *   conversionTypes?: list<string>|null,
 *   createdAt?: string|null,
 *   headers?: list<Header|HeaderShape>|null,
 *   httpMethod?: string|null,
 *   latestResponse?: null|LatestResponse|LatestResponseShape,
 *   smartLinkIDs?: list<string>|null,
 *   smartLinkScope?: string|null,
 *   smartLinks?: list<SmartLink|SmartLinkShape>|null,
 *   trafficSourceIDs?: list<mixed>|null,
 *   trafficSources?: list<mixed>|null,
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

    #[Optional('latest_response')]
    public ?LatestResponse $latestResponse;

    /** @var list<string>|null $smartLinkIDs */
    #[Optional('smart_link_ids', list: 'string')]
    public ?array $smartLinkIDs;

    #[Optional('smart_link_scope')]
    public ?string $smartLinkScope;

    /** @var list<SmartLink>|null $smartLinks */
    #[Optional('smart_links', list: SmartLink::class)]
    public ?array $smartLinks;

    /** @var list<mixed>|null $trafficSourceIDs */
    #[Optional('traffic_source_ids', list: 'mixed')]
    public ?array $trafficSourceIDs;

    /** @var list<mixed>|null $trafficSources */
    #[Optional('traffic_sources', list: 'mixed')]
    public ?array $trafficSources;

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
     * @param LatestResponse|LatestResponseShape|null $latestResponse
     * @param list<string>|null $smartLinkIDs
     * @param list<SmartLink|SmartLinkShape>|null $smartLinks
     * @param list<mixed>|null $trafficSourceIDs
     * @param list<mixed>|null $trafficSources
     */
    public static function with(
        ?int $id = null,
        ?string $body = null,
        ?array $conversionTypes = null,
        ?string $createdAt = null,
        ?array $headers = null,
        ?string $httpMethod = null,
        LatestResponse|array|null $latestResponse = null,
        ?array $smartLinkIDs = null,
        ?string $smartLinkScope = null,
        ?array $smartLinks = null,
        ?array $trafficSourceIDs = null,
        ?array $trafficSources = null,
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
        null !== $trafficSourceIDs && $self['trafficSourceIDs'] = $trafficSourceIDs;
        null !== $trafficSources && $self['trafficSources'] = $trafficSources;
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

    /**
     * @param LatestResponse|LatestResponseShape $latestResponse
     */
    public function withLatestResponse(
        LatestResponse|array $latestResponse
    ): self {
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

    /**
     * @param list<mixed> $trafficSourceIDs
     */
    public function withTrafficSourceIDs(array $trafficSourceIDs): self
    {
        $self = clone $this;
        $self['trafficSourceIDs'] = $trafficSourceIDs;

        return $self;
    }

    /**
     * @param list<mixed> $trafficSources
     */
    public function withTrafficSources(array $trafficSources): self
    {
        $self = clone $this;
        $self['trafficSources'] = $trafficSources;

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
