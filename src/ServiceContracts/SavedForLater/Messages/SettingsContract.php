<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SavedForLater\Messages;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingDisableAutomaticMessagingResponse;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingParams\Period;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingResponse;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingGetResponse;

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
