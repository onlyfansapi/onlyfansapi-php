<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\WebhooksContract;
use OnlyFansAPI\Webhooks\WebhookGetResponse;
use OnlyFansAPI\Webhooks\WebhookListEventsResponse;
use OnlyFansAPI\Webhooks\WebhookListResponse;
use OnlyFansAPI\Webhooks\WebhookNewResponse;
use OnlyFansAPI\Webhooks\WebhookUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class WebhooksService implements WebhooksContract
{
    /**
     * @api
     */
    public WebhooksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhooksRawService($client);
    }

    /**
     * @api
     *
     * Create a new webhook for your Team
     *
     * @param string $accountScope The account scope for the webhook (OnlyFans and Fansly webhooks alike). Use "global" for all accounts, "inclusive" for only selected accounts, or "exclusive" for all except selected accounts.
     * @param string $endpointURL the URL of your webhook endpoint
     * @param list<string> $events An array of webhook events to subscribe to. For all options, refer to our **List Available Events** endpoint. A webhook is single-platform: subscribe to either OnlyFans events or Fansly (`fansly.*`) events, never both in one webhook.
     * @param list<string> $accountIDs An array of account IDs to apply the scope to. Use OnlyFans account IDs (`acct_...`) for OnlyFans webhooks and Fansly account IDs (`fansly_acct_...`) for Fansly webhooks. Required unless account_scope is "global".
     * @param string|null $signingSecret optionally, add a signing secret to protect your webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $accountScope,
        string $endpointURL,
        array $events,
        ?array $accountIDs = null,
        ?string $signingSecret = null,
        RequestOptions|array|null $requestOptions = null,
    ): WebhookNewResponse {
        $params = Util::removeNulls(
            [
                'accountScope' => $accountScope,
                'endpointURL' => $endpointURL,
                'events' => $events,
                'accountIDs' => $accountIDs,
                'signingSecret' => $signingSecret,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details about a specific webhook
     *
     * @param string $webhookID The ID of the webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $webhookID,
        RequestOptions|array|null $requestOptions = null
    ): WebhookGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($webhookID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing webhook
     *
     * @param string $webhookID The ID of the webhook
     * @param string $accountScope The account scope for the webhook (OnlyFans and Fansly webhooks alike). Use "global" for all accounts, "inclusive" for only selected accounts, or "exclusive" for all except selected accounts.
     * @param string $endpointURL the URL of your webhook endpoint
     * @param list<string> $events An array of webhook events to subscribe to. For all options, refer to our **List Available Events** endpoint. A webhook is single-platform: subscribe to either OnlyFans events or Fansly (`fansly.*`) events, never both in one webhook.
     * @param list<string> $accountIDs An array of account IDs to apply the scope to. Use OnlyFans account IDs (`acct_...`) for OnlyFans webhooks and Fansly account IDs (`fansly_acct_...`) for Fansly webhooks. Required unless account_scope is "global".
     * @param bool|null $enabled Optionally, enabled/disable the webhook. This will stop/resume the sending of events, without having to delete the webhook.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $webhookID,
        string $accountScope,
        string $endpointURL,
        array $events,
        ?array $accountIDs = null,
        ?bool $enabled = null,
        RequestOptions|array|null $requestOptions = null,
    ): WebhookUpdateResponse {
        $params = Util::removeNulls(
            [
                'accountScope' => $accountScope,
                'endpointURL' => $endpointURL,
                'events' => $events,
                'accountIDs' => $accountIDs,
                'enabled' => $enabled,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($webhookID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of webhooks for your Team
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): WebhookListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing webhook
     *
     * @param string $webhookID The ID of the webhook
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $webhookID,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($webhookID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of all available webhook event types
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listEvents(
        RequestOptions|array|null $requestOptions = null
    ): WebhookListEventsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listEvents(requestOptions: $requestOptions);

        return $response->parse();
    }
}
