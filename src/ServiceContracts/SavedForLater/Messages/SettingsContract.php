<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\SavedForLater\Messages;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingDisableAutomaticMessagingResponse;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingParams\Period;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingResponse;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingGetResponse;

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
    public function disableAutomaticMessaging(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): SettingDisableAutomaticMessagingResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param Period|value-of<Period> $period The automatic messaging interval (in hours)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enableOrUpdateAutomaticMessaging(
        string $account,
        Period|int $period,
        RequestOptions|array|null $requestOptions = null,
    ): SettingEnableOrUpdateAutomaticMessagingResponse;
}
