<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\SavedForLater\Posts;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingDisableAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingParams;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingParams\Period;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingGetResponse;
use OnlyFansAPI\ServiceContracts\SavedForLater\Posts\SettingsRawContract;

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
     * Get the Saved For Later post settings.
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
            path: ['api/%1$s/saved-for-later/posts/settings', $account],
            options: $requestOptions,
            convert: SettingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Disable automatic posting of Saved For Later posts.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingDisableAutomaticPostingResponse>
     *
     * @throws APIException
     */
    public function disableAutomaticPosting(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'api/%1$s/saved-for-later/posts/settings/disable-automatic-posting',
                $account,
            ],
            options: $requestOptions,
            convert: SettingDisableAutomaticPostingResponse::class,
        );
    }

    /**
     * @api
     *
     * Enable or update automatic posting of Saved For Later posts.
     *
     * @param string $account The Account ID
     * @param array{
     *   period: Period|value-of<Period>
     * }|SettingEnableOrUpdateAutomaticPostingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingEnableOrUpdateAutomaticPostingResponse>
     *
     * @throws APIException
     */
    public function enableOrUpdateAutomaticPosting(
        string $account,
        array|SettingEnableOrUpdateAutomaticPostingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingEnableOrUpdateAutomaticPostingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'api/%1$s/saved-for-later/posts/settings/enable-or-update-automatic-posting',
                $account,
            ],
            body: (object) $parsed,
            options: $options,
            convert: SettingEnableOrUpdateAutomaticPostingResponse::class,
        );
    }
}
