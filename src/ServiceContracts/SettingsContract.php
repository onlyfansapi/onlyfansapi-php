<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Settings\SettingCheckUsernameExistsResponse;
use Onlyfansapi\Settings\SettingGetResponse;
use Onlyfansapi\Settings\SettingUpdateProfileResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SettingsContract
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
    ): SettingGetResponse;

    /**
     * @api
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
    ): SettingCheckUsernameExistsResponse;

    /**
     * @api
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
    ): SettingUpdateProfileResponse;
}
