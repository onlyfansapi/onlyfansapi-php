<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Settings;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Settings\WelcomeMessageContract;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageGetResponse;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageToggleResponse;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class WelcomeMessageService implements WelcomeMessageContract
{
    /**
     * @api
     */
    public WelcomeMessageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WelcomeMessageRawService($client);
    }

    /**
     * @api
     *
     * Get the current automatic welcome message template that is sent when someone subscribes.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): WelcomeMessageGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the automatic welcome message template that is sent when someone subscribes.
     *
     * @param string $account The Account ID
     * @param bool $lockedText whether the text should be shown or hidden
     * @param list<mixed> $mediaFiles Direct file uploads, OFAPI `ofapi_media_` IDs, or OF vault IDs. Will be hidden if `price` is provided.
     * @param list<mixed> $previews Direct file uploads, OFAPI `ofapi_media_` IDs, OF vault IDs, or integer indices referencing uploaded files in `mediaFiles`. Will be shown if `price` is provided.
     * @param int $price Price for paid content (0 or between 3-200). In case this is not zero, **mediaFiles** is required.
     * @param string $rfGuest array of OnlyFans Release Form Guest IDs to tag in your message
     * @param string $rfPartner array of OnlyFans Release Form Partners IDs to tag in your message
     * @param string $rfTag array of OnlyFans Creator User IDs to tag in your message
     * @param string $text The welcome message text content. Required unless a media file is present.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $account,
        ?bool $isForward = null,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
        ?string $rfGuest = null,
        ?string $rfPartner = null,
        ?string $rfTag = null,
        ?string $text = null,
        RequestOptions|array|null $requestOptions = null,
    ): WelcomeMessageUpdateResponse {
        $params = Util::removeNulls(
            [
                'isForward' => $isForward,
                'lockedText' => $lockedText,
                'mediaFiles' => $mediaFiles,
                'previews' => $previews,
                'price' => $price,
                'rfGuest' => $rfGuest,
                'rfPartner' => $rfPartner,
                'rfTag' => $rfTag,
                'text' => $text,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Enable or disable the automatic welcome message that is sent when someone subscribes.
     *
     * @param string $account The Account ID
     * @param bool $enabled whether the welcome message should be enabled
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function toggle(
        string $account,
        bool $enabled,
        RequestOptions|array|null $requestOptions = null,
    ): WelcomeMessageToggleResponse {
        $params = Util::removeNulls(['enabled' => $enabled]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->toggle($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
