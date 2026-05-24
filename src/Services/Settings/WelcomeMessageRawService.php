<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Settings;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Settings\WelcomeMessageRawContract;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageGetResponse;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageToggleParams;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageToggleResponse;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageUpdateParams;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class WelcomeMessageRawService implements WelcomeMessageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the current automatic welcome message template that is sent when someone subscribes.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WelcomeMessageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/settings/welcome-message', $account],
            options: $requestOptions,
            convert: WelcomeMessageGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the automatic welcome message template that is sent when someone subscribes.
     *
     * @param string $account The Account ID
     * @param array{
     *   isForward?: bool,
     *   lockedText?: bool,
     *   mediaFiles?: list<mixed>,
     *   previews?: list<mixed>,
     *   price?: int,
     *   rfGuest?: string,
     *   rfPartner?: string,
     *   rfTag?: string,
     *   text?: string,
     * }|WelcomeMessageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WelcomeMessageUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $account,
        array|WelcomeMessageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WelcomeMessageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/settings/welcome-message', $account],
            body: (object) $parsed,
            options: $options,
            convert: WelcomeMessageUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Enable or disable the automatic welcome message that is sent when someone subscribes.
     *
     * @param string $account The Account ID
     * @param array{enabled: bool}|WelcomeMessageToggleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WelcomeMessageToggleResponse>
     *
     * @throws APIException
     */
    public function toggle(
        string $account,
        array|WelcomeMessageToggleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WelcomeMessageToggleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['api/%1$s/settings/welcome-message', $account],
            body: (object) $parsed,
            options: $options,
            convert: WelcomeMessageToggleResponse::class,
        );
    }
}
