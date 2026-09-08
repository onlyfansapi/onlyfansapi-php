<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\SavedForLater\Posts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingDisableAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingParams\Period;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingGetResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SettingsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): SettingGetResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disableAutomaticPosting(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): SettingDisableAutomaticPostingResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param Period|value-of<Period> $period The automatic posting interval (in hours)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enableOrUpdateAutomaticPosting(
        string $account,
        Period|int $period,
        RequestOptions|array|null $requestOptions = null,
    ): SettingEnableOrUpdateAutomaticPostingResponse;
}
