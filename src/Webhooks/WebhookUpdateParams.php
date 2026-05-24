<?php

declare(strict_types=1);

namespace Onlyfansapi\Webhooks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Update an existing webhook.
 *
 * @see Onlyfansapi\Services\WebhooksService::update()
 *
 * @phpstan-type WebhookUpdateParamsShape = array{
 *   accountScope: string,
 *   endpointURL: string,
 *   events: list<string>,
 *   accountIDs?: list<string>|null,
 *   enabled?: bool|null,
 * }
 */
final class WebhookUpdateParams implements BaseModel
{
    /** @use SdkModel<WebhookUpdateParamsShape> */
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
     * Optionally, enabled/disable the webhook. This will stop/resume the sending of events, without having to delete the webhook.
     */
    #[Optional(nullable: true)]
    public ?bool $enabled;

    /**
     * `new WebhookUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookUpdateParams::with(accountScope: ..., endpointURL: ..., events: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookUpdateParams)
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
        ?bool $enabled = null,
    ): self {
        $self = new self;

        $self['accountScope'] = $accountScope;
        $self['endpointURL'] = $endpointURL;
        $self['events'] = $events;

        null !== $accountIDs && $self['accountIDs'] = $accountIDs;
        null !== $enabled && $self['enabled'] = $enabled;

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
     * Optionally, enabled/disable the webhook. This will stop/resume the sending of events, without having to delete the webhook.
     */
    public function withEnabled(?bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }
}
