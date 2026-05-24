<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SavedForLater\Posts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SavedForLater\Posts\Settings\SettingDisableAutomaticPostingResponse;
use Onlyfansapi\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingParams\Period;
use Onlyfansapi\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingResponse;
use Onlyfansapi\SavedForLater\Posts\Settings\SettingGetResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
