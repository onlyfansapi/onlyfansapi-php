<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\SavedForLater\Posts;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingDisableAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingParams\Period;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingGetResponse;
use OnlyFansAPI\ServiceContracts\SavedForLater\Posts\SettingsContract;

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
     * Get the Saved For Later post settings.
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
     * Disable automatic posting of Saved For Later posts.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disableAutomaticPosting(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): SettingDisableAutomaticPostingResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->disableAutomaticPosting($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Enable or update automatic posting of Saved For Later posts.
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
    ): SettingEnableOrUpdateAutomaticPostingResponse {
        $params = Util::removeNulls(['period' => $period]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->enableOrUpdateAutomaticPosting($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
