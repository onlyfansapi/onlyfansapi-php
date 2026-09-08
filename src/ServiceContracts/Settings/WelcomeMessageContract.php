<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Settings;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageGetResponse;
use OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageToggleResponse;
use OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface WelcomeMessageContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): WelcomeMessageGetResponse;

    /**
     * @api
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
    ): WelcomeMessageUpdateResponse;

    /**
     * @api
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
    ): WelcomeMessageToggleResponse;
}
