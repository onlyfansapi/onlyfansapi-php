<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\WebhooksContract;
use Onlyfansapi\Webhooks\WebhookNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * @param string $accountScope The account scope for the webhook. Use "global" for all accounts, "inclusive" for only selected accounts, or "exclusive" for all except selected accounts.
     * @param string $endpointURL the URL of your webhook endpoint
     * @param list<string> $events An array of webhook events to subscribe to. For all options, refer to our **List Available Events** endpoint.
     * @param list<string> $accountIDs An array of account IDs to apply the scope to. Required unless account_scope is "global".
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
     * Delete an existing webhook
     *
     * @param string $webhookID The ID of the webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $webhookID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($webhookID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
