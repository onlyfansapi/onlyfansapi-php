<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Webhooks\WebhookNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface WebhooksContract
{
    /**
     * @api
     *
     * @param string $endpointURL the URL of your webhook endpoint
     * @param list<string> $events An array of webhook events to subscribe to. Options: `messages.received`, `messages.sent`, `messages.ppv.unlocked`, `subscriptions.new`, `users.typing`, `posts.liked`, `accounts.connected`, `accounts.reconnected`, `accounts.session_expired`, `accounts.authentication_failed`, `accounts.otp_code_required`, `accounts.face_otp_required`
     * @param string|null $signingSecret optionally, add a signing secret to protect your webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $endpointURL,
        array $events,
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
    public function delete(
        string $webhookID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
