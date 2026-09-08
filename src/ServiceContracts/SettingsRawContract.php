<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Settings\SettingCheckUsernameAvailabilityParams;
use OnlyFansAPI\Settings\SettingCheckUsernameAvailabilityResponse;
use OnlyFansAPI\Settings\SettingGetResponse;
use OnlyFansAPI\Settings\SettingUpdateProfileParams;
use OnlyFansAPI\Settings\SettingUpdateProfileResponse;
use OnlyFansAPI\Settings\SettingUpdateSubscriptionPriceParams;
use OnlyFansAPI\Settings\SettingUpdateSubscriptionPriceResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SettingsRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SettingCheckUsernameAvailabilityParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SettingUpdateProfileParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SettingUpdateSubscriptionPriceParams $params
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
    ): BaseResponse;
}
