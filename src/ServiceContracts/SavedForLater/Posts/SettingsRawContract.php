<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SavedForLater\Posts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SavedForLater\Posts\Settings\SettingDisableAutomaticPostingResponse;
use Onlyfansapi\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingParams;
use Onlyfansapi\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingResponse;
use Onlyfansapi\SavedForLater\Posts\Settings\SettingGetResponse;

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
