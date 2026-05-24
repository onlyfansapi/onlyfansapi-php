<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SavedForLater\Messages;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingDisableAutomaticMessagingResponse;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingParams;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingResponse;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingGetResponse;

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
