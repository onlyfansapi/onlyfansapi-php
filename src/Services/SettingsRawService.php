<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SettingsRawContract;
use Onlyfansapi\Settings\SettingCheckUsernameExistsParams;
use Onlyfansapi\Settings\SettingCheckUsernameExistsResponse;
use Onlyfansapi\Settings\SettingGetResponse;
use Onlyfansapi\Settings\SettingUpdateProfileParams;
use Onlyfansapi\Settings\SettingUpdateProfileResponse;

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
     * @param array{username: string}|SettingCheckUsernameExistsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingCheckUsernameExistsResponse>
     *
     * @throws APIException
     */
    public function checkUsernameExists(
        string $account,
        array|SettingCheckUsernameExistsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingCheckUsernameExistsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/settings/username-exists', $account],
            body: (object) $parsed,
            options: $options,
            convert: SettingCheckUsernameExistsResponse::class,
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
}
