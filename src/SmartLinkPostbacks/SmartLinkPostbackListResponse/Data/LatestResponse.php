<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type LatestResponseShape = array{
 *   id?: int|null,
 *   conversionType?: string|null,
 *   createdAt?: string|null,
 *   errorMessage?: string|null,
 *   errorType?: string|null,
 *   postbackURL?: string|null,
 *   statusCode?: int|null,
 *   succeeded?: bool|null,
 * }
 */
final class LatestResponse implements BaseModel
{
    /** @use SdkModel<LatestResponseShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional('conversion_type')]
    public ?string $conversionType;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('error_message', nullable: true)]
    public ?string $errorMessage;

    #[Optional('error_type', nullable: true)]
    public ?string $errorType;

    #[Optional('postback_url')]
    public ?string $postbackURL;

    #[Optional('status_code')]
    public ?int $statusCode;

    #[Optional]
    public ?bool $succeeded;

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
        ?string $conversionType = null,
        ?string $createdAt = null,
        ?string $errorMessage = null,
        ?string $errorType = null,
        ?string $postbackURL = null,
        ?int $statusCode = null,
        ?bool $succeeded = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $conversionType && $self['conversionType'] = $conversionType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $errorMessage && $self['errorMessage'] = $errorMessage;
        null !== $errorType && $self['errorType'] = $errorType;
        null !== $postbackURL && $self['postbackURL'] = $postbackURL;
        null !== $statusCode && $self['statusCode'] = $statusCode;
        null !== $succeeded && $self['succeeded'] = $succeeded;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withConversionType(string $conversionType): self
    {
        $self = clone $this;
        $self['conversionType'] = $conversionType;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withErrorMessage(?string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }

    public function withErrorType(?string $errorType): self
    {
        $self = clone $this;
        $self['errorType'] = $errorType;

        return $self;
    }

    public function withPostbackURL(string $postbackURL): self
    {
        $self = clone $this;
        $self['postbackURL'] = $postbackURL;

        return $self;
    }

    public function withStatusCode(int $statusCode): self
    {
        $self = clone $this;
        $self['statusCode'] = $statusCode;

        return $self;
    }

    public function withSucceeded(bool $succeeded): self
    {
        $self = clone $this;
        $self['succeeded'] = $succeeded;

        return $self;
    }
}
