<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SettingsContract;
use Onlyfansapi\Settings\SettingCheckUsernameExistsResponse;
use Onlyfansapi\Settings\SettingGetResponse;
use Onlyfansapi\Settings\SettingUpdateProfileResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
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
    public function checkUsernameExists(
        string $account,
        string $username,
        RequestOptions|array|null $requestOptions = null,
    ): SettingCheckUsernameExistsResponse {
        $params = Util::removeNulls(['username' => $username]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->checkUsernameExists($account, params: $params, requestOptions: $requestOptions);

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
}
