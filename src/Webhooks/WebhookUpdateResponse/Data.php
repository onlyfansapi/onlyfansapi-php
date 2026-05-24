<?php

declare(strict_types=1);

namespace Onlyfansapi\Webhooks\WebhookUpdateResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   enabled?: bool|null,
 *   events?: list<string>|null,
 *   hasSigningSecret?: bool|null,
 *   url?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional]
    public ?bool $enabled;

    /** @var list<string>|null $events */
    #[Optional(list: 'string')]
    public ?array $events;

    #[Optional('has_signing_secret')]
    public ?bool $hasSigningSecret;

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
     * @param list<string>|null $events
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?bool $enabled = null,
        ?array $events = null,
        ?bool $hasSigningSecret = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $enabled && $self['enabled'] = $enabled;
        null !== $events && $self['events'] = $events;
        null !== $hasSigningSecret && $self['hasSigningSecret'] = $hasSigningSecret;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * @param list<string> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }

    public function withHasSigningSecret(bool $hasSigningSecret): self
    {
        $self = clone $this;
        $self['hasSigningSecret'] = $hasSigningSecret;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
