<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account\OnlyfansData;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type AgeVerificationSessionShape = array{
 *   apiFlow?: string|null,
 *   expiredAt?: string|null,
 *   status?: string|null,
 *   url?: string|null,
 * }
 */
final class AgeVerificationSession implements BaseModel
{
    /** @use SdkModel<AgeVerificationSessionShape> */
    use SdkModel;

    #[Optional]
    public ?string $apiFlow;

    #[Optional]
    public ?string $expiredAt;

    #[Optional]
    public ?string $status;

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
     */
    public static function with(
        ?string $apiFlow = null,
        ?string $expiredAt = null,
        ?string $status = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $apiFlow && $self['apiFlow'] = $apiFlow;
        null !== $expiredAt && $self['expiredAt'] = $expiredAt;
        null !== $status && $self['status'] = $status;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withAPIFlow(string $apiFlow): self
    {
        $self = clone $this;
        $self['apiFlow'] = $apiFlow;

        return $self;
    }

    public function withExpiredAt(string $expiredAt): self
    {
        $self = clone $this;
        $self['expiredAt'] = $expiredAt;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
