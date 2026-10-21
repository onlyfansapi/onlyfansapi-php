<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\SavedForLater\Messages;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingDisableAutomaticMessagingResponse;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingParams;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingParams\Period;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingResponse;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingGetResponse;
use OnlyFansAPI\ServiceContracts\SavedForLater\Messages\SettingsRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     * Get the Saved For Later message settings.
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
            path: ['api/%1$s/saved-for-later/messages/settings', $account],
            options: $requestOptions,
            convert: SettingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Disable automatic messaging of Saved For Later messages.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingDisableAutomaticMessagingResponse>
     *
     * @throws APIException
     */
    public function disableAutomaticMessaging(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'api/%1$s/saved-for-later/messages/settings/disable-automatic-messaging',
                $account,
            ],
            options: $requestOptions,
            convert: SettingDisableAutomaticMessagingResponse::class,
        );
    }

    /**
     * @api
     *
     * Enable or update automatic messaging of Saved For Later messages.
     *
     * @param string $account The Account ID
     * @param array{
     *   period: Period|value-of<Period>
     * }|SettingEnableOrUpdateAutomaticMessagingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingEnableOrUpdateAutomaticMessagingResponse>
     *
     * @throws APIException
     */
    public function enableOrUpdateAutomaticMessaging(
        string $account,
        array|SettingEnableOrUpdateAutomaticMessagingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingEnableOrUpdateAutomaticMessagingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'api/%1$s/saved-for-later/messages/settings/enable-or-update-automatic-messaging',
                $account,
            ],
            body: (object) $parsed,
            options: $options,
            convert: SettingEnableOrUpdateAutomaticMessagingResponse::class,
        );
    }
}
