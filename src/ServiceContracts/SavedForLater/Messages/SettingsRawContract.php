<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\SavedForLater\Messages;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingDisableAutomaticMessagingResponse;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingParams;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingResponse;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingGetResponse;

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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingDisableAutomaticMessagingResponse>
     *
     * @throws APIException
     */
    public function disableAutomaticMessaging(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SettingEnableOrUpdateAutomaticMessagingParams $params
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
    ): BaseResponse;
}
