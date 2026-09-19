<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\SavedForLater\Posts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingDisableAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingParams;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingGetResponse;

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
     * @return BaseResponse<SettingDisableAutomaticPostingResponse>
     *
     * @throws APIException
     */
    public function disableAutomaticPosting(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|SettingEnableOrUpdateAutomaticPostingParams $params
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
    ): BaseResponse;
}
