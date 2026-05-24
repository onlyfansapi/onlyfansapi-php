<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Settings\SettingCheckUsernameExistsParams;
use Onlyfansapi\Settings\SettingCheckUsernameExistsResponse;
use Onlyfansapi\Settings\SettingGetResponse;
use Onlyfansapi\Settings\SettingUpdateProfileParams;
use Onlyfansapi\Settings\SettingUpdateProfileResponse;

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
     * @param array<string,mixed>|SettingCheckUsernameExistsParams $params
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
}
