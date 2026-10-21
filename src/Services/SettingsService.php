<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\SettingsContract;
use OnlyFansAPI\Services\Settings\BlockedCountriesService;
use OnlyFansAPI\Services\Settings\SocialMediaButtonsService;
use OnlyFansAPI\Services\Settings\WelcomeMessageService;
use OnlyFansAPI\Settings\SettingCheckUsernameAvailabilityResponse;
use OnlyFansAPI\Settings\SettingGetResponse;
use OnlyFansAPI\Settings\SettingUpdateProfileResponse;
use OnlyFansAPI\Settings\SettingUpdateSubscriptionPriceResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @api
     */
    public BlockedCountriesService $blockedCountries;

    /**
     * @api
     */
    public WelcomeMessageService $welcomeMessage;

    /**
     * @api
     */
    public SocialMediaButtonsService $socialMediaButtons;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
        $this->blockedCountries = new BlockedCountriesService($client);
        $this->welcomeMessage = new WelcomeMessageService($client);
        $this->socialMediaButtons = new SocialMediaButtonsService($client);
    }

    /**
     * @api
     *
     * Returns the account settings
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): SettingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check if a username is taken. Returns `false` if the username is available, `true` if it is already taken.
     *
     * @param string $account The Account ID
     * @param string $username the username to check
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function checkUsernameAvailability(
        string $account,
        string $username,
        RequestOptions|array|null $requestOptions = null,
    ): SettingCheckUsernameAvailabilityResponse {
        $params = Util::removeNulls(['username' => $username]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->checkUsernameAvailability($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the account profile. **Only include the fields you want to update.** To make a field empty, set it to `null`.
     *
     * @param string $account The Account ID
     * @param string|null $about The new bio to use. Set to `null` to empty it.
     * @param string $avatar The new avatar to use. Must be a `ofapi_media_` ID. Refer to our `/media/upload` endpoint on how to get this.
     * @param string $header The new header (banner) to use. Must be a `ofapi_media_` ID. Refer to our `/media/upload` endpoint on how to get this.
     * @param string|null $location The new location to use. Set to `null` to empty it.
     * @param string|null $name The new display name to use. Set to `null` to use the default display name.
     * @param string $username The new username to use. Make sure to first check if it exists using our `/settings/username-exists` endpoint.
     * @param string|null $website The new website URL to use. Must be a valid URL. Set to `null` to empty it.
     * @param string|null $wishlist The new Amazon Wishlist URL to use. Must be a valid URL. Set to `null` to empty it.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateProfile(
        string $account,
        ?string $about = null,
        ?string $avatar = null,
        ?string $header = null,
        ?string $location = null,
        ?string $name = null,
        ?string $username = null,
        ?string $website = null,
        ?string $wishlist = null,
        RequestOptions|array|null $requestOptions = null,
    ): SettingUpdateProfileResponse {
        $params = Util::removeNulls(
            [
                'about' => $about,
                'avatar' => $avatar,
                'header' => $header,
                'location' => $location,
                'name' => $name,
                'username' => $username,
                'website' => $website,
                'wishlist' => $wishlist,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateProfile($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the account subscription price. Send `0` or `"free"` to make the account free. ⚠️ WARNING! OnlyFans limits updating the subscription price to max. 3 times per day.
     *
     * @param string $account The Account ID
     * @param string $price The new subscription price. Accepts `0`, `"free"`, or a number between 4.99 and 200.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSubscriptionPrice(
        string $account,
        string $price,
        RequestOptions|array|null $requestOptions = null,
    ): SettingUpdateSubscriptionPriceResponse {
        $params = Util::removeNulls(['price' => $price]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateSubscriptionPrice($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
