<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\SavedForLater\Messages;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingDisableAutomaticMessagingResponse;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingParams\Period;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingResponse;
use OnlyFansAPI\SavedForLater\Messages\Settings\SettingGetResponse;
use OnlyFansAPI\ServiceContracts\SavedForLater\Messages\SettingsContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
    }

    /**
     * @api
     *
     * Get the Saved For Later message settings.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): SettingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Disable automatic messaging of Saved For Later messages.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disableAutomaticMessaging(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): SettingDisableAutomaticMessagingResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->disableAutomaticMessaging($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Enable or update automatic messaging of Saved For Later messages.
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
    ): SettingEnableOrUpdateAutomaticMessagingResponse {
        $params = Util::removeNulls(['period' => $period]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->enableOrUpdateAutomaticMessaging($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
