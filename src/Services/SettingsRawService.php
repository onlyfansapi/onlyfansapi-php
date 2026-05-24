<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SettingsRawContract;
use Onlyfansapi\Settings\SettingCheckUsernameAvailabilityParams;
use Onlyfansapi\Settings\SettingCheckUsernameAvailabilityResponse;
use Onlyfansapi\Settings\SettingGetResponse;
use Onlyfansapi\Settings\SettingUpdateProfileParams;
use Onlyfansapi\Settings\SettingUpdateProfileResponse;
use Onlyfansapi\Settings\SettingUpdateSubscriptionPriceParams;
use Onlyfansapi\Settings\SettingUpdateSubscriptionPriceResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class SettingsRawService implements SettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the account settings
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/settings', $account],
            options: $requestOptions,
            convert: SettingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Check if a username is taken. Returns `false` if the username is available, `true` if it is already taken.
     *
     * @param string $account The Account ID
     * @param array{username: string}|SettingCheckUsernameAvailabilityParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingCheckUsernameAvailabilityResponse>
     *
     * @throws APIException
     */
    public function checkUsernameAvailability(
        string $account,
        array|SettingCheckUsernameAvailabilityParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingCheckUsernameAvailabilityParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/settings/username-exists', $account],
            body: (object) $parsed,
            options: $options,
            convert: SettingCheckUsernameAvailabilityResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates the account profile. **Only include the fields you want to update.** To make a field empty, set it to `null`.
     *
     * @param string $account The Account ID
     * @param array{
     *   about?: string|null,
     *   avatar?: string,
     *   header?: string,
     *   location?: string|null,
     *   name?: string|null,
     *   username?: string,
     *   website?: string|null,
     *   wishlist?: string|null,
     * }|SettingUpdateProfileParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingUpdateProfileResponse>
     *
     * @throws APIException
     */
    public function updateProfile(
        string $account,
        array|SettingUpdateProfileParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingUpdateProfileParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/settings/profile', $account],
            body: (object) $parsed,
            options: $options,
            convert: SettingUpdateProfileResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the account subscription price. Send `0` or `"free"` to make the account free. ⚠️ WARNING! OnlyFans limits updating the subscription price to max. 3 times per day.
     *
     * @param string $account The Account ID
     * @param array{price: string}|SettingUpdateSubscriptionPriceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingUpdateSubscriptionPriceResponse>
     *
     * @throws APIException
     */
    public function updateSubscriptionPrice(
        string $account,
        array|SettingUpdateSubscriptionPriceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingUpdateSubscriptionPriceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['api/%1$s/settings/subscription-price', $account],
            body: (object) $parsed,
            options: $options,
            convert: SettingUpdateSubscriptionPriceResponse::class,
        );
    }
}
