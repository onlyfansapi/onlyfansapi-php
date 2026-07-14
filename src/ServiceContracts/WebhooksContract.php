<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Webhooks\WebhookGetResponse;
use OnlyFansAPI\Webhooks\WebhookListEventsResponse;
use OnlyFansAPI\Webhooks\WebhookListResponse;
use OnlyFansAPI\Webhooks\WebhookNewResponse;
use OnlyFansAPI\Webhooks\WebhookUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface WebhooksContract
{
    /**
     * @api
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
    ): WebhookNewResponse;

    /**
     * @api
     *
     * @param string $webhookID The ID of the webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $webhookID,
        RequestOptions|array|null $requestOptions = null
    ): WebhookGetResponse;

    /**
     * @api
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
    ): WebhookUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): WebhookListResponse;

    /**
     * @api
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
    ): array;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listEvents(
        RequestOptions|array|null $requestOptions = null
    ): WebhookListEventsResponse;
}
