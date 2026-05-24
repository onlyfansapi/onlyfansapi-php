<?php

declare(strict_types=1);

namespace Onlyfansapi\Webhooks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Create a new webhook for your Team.
 *
 * @see Onlyfansapi\Services\WebhooksService::create()
 *
 * @phpstan-type WebhookCreateParamsShape = array{
 *   endpointURL: string, events: list<string>, signingSecret?: string|null
 * }
 */
final class WebhookCreateParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL of your webhook endpoint.
     */
    #[Required('endpoint_url')]
    public string $endpointURL;

    /**
     * An array of webhook events to subscribe to. Options: `messages.received`, `messages.sent`, `messages.ppv.unlocked`, `subscriptions.new`, `users.typing`, `posts.liked`, `accounts.connected`, `accounts.reconnected`, `accounts.session_expired`, `accounts.authentication_failed`, `accounts.otp_code_required`, `accounts.face_otp_required`.
     *
     * @var list<string> $events
     */
    #[Required(list: 'string')]
    public array $events;

    /**
     * Optionally, add a signing secret to protect your webhook.
     */
    #[Optional('signing_secret', nullable: true)]
    public ?string $signingSecret;

    /**
     * `new WebhookCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateParams::with(endpointURL: ..., events: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateParams)->withEndpointURL(...)->withEvents(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $events
     */
    public static function with(
        string $endpointURL,
        array $events,
        ?string $signingSecret = null
    ): self {
        $self = new self;

        $self['endpointURL'] = $endpointURL;
        $self['events'] = $events;

        null !== $signingSecret && $self['signingSecret'] = $signingSecret;

        return $self;
    }

    /**
     * The URL of your webhook endpoint.
     */
    public function withEndpointURL(string $endpointURL): self
    {
        $self = clone $this;
        $self['endpointURL'] = $endpointURL;

        return $self;
    }

    /**
     * An array of webhook events to subscribe to. Options: `messages.received`, `messages.sent`, `messages.ppv.unlocked`, `subscriptions.new`, `users.typing`, `posts.liked`, `accounts.connected`, `accounts.reconnected`, `accounts.session_expired`, `accounts.authentication_failed`, `accounts.otp_code_required`, `accounts.face_otp_required`.
     *
     * @param list<string> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }

    /**
     * Optionally, add a signing secret to protect your webhook.
     */
    public function withSigningSecret(?string $signingSecret): self
    {
        $self = clone $this;
        $self['signingSecret'] = $signingSecret;

        return $self;
    }
}
