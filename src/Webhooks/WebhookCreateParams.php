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
 *   accountScope: string,
 *   endpointURL: string,
 *   events: list<string>,
 *   accountIDs?: list<string>|null,
 *   signingSecret?: string|null,
 * }
 */
final class WebhookCreateParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The account scope for the webhook. Use "global" for all accounts, "inclusive" for only selected accounts, or "exclusive" for all except selected accounts.
     */
    #[Required('account_scope')]
    public string $accountScope;

    /**
     * The URL of your webhook endpoint.
     */
    #[Required('endpoint_url')]
    public string $endpointURL;

    /**
     * An array of webhook events to subscribe to. For all options, refer to our **List Available Events** endpoint.
     *
     * @var list<string> $events
     */
    #[Required(list: 'string')]
    public array $events;

    /**
     * An array of account IDs to apply the scope to. Required unless account_scope is "global".
     *
     * @var list<string>|null $accountIDs
     */
    #[Optional('account_ids', list: 'string')]
    public ?array $accountIDs;

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
     * WebhookCreateParams::with(accountScope: ..., endpointURL: ..., events: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateParams)
     *   ->withAccountScope(...)
     *   ->withEndpointURL(...)
     *   ->withEvents(...)
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
     * @param list<string>|null $accountIDs
     */
    public static function with(
        string $accountScope,
        string $endpointURL,
        array $events,
        ?array $accountIDs = null,
        ?string $signingSecret = null,
    ): self {
        $self = new self;

        $self['accountScope'] = $accountScope;
        $self['endpointURL'] = $endpointURL;
        $self['events'] = $events;

        null !== $accountIDs && $self['accountIDs'] = $accountIDs;
        null !== $signingSecret && $self['signingSecret'] = $signingSecret;

        return $self;
    }

    /**
     * The account scope for the webhook. Use "global" for all accounts, "inclusive" for only selected accounts, or "exclusive" for all except selected accounts.
     */
    public function withAccountScope(string $accountScope): self
    {
        $self = clone $this;
        $self['accountScope'] = $accountScope;

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
     * An array of webhook events to subscribe to. For all options, refer to our **List Available Events** endpoint.
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
     * An array of account IDs to apply the scope to. Required unless account_scope is "global".
     *
     * @param list<string> $accountIDs
     */
    public function withAccountIDs(array $accountIDs): self
    {
        $self = clone $this;
        $self['accountIDs'] = $accountIDs;

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
