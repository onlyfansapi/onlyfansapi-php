<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
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
