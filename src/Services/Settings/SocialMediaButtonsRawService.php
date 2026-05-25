<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Settings;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Settings\SocialMediaButtonsRawContract;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonAddParams;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonAddParams\Type;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonAddResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonDeleteParams;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonDeleteResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonListResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonReorderParams;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonReorderResponse;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonUpdateParams;
use OnlyFansAPI\Settings\SocialMediaButtons\SocialMediaButtonUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SocialMediaButtonsRawService implements SocialMediaButtonsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Updates a social media button from the account
     *
     * @param string $buttonID Path param: The ID of the social media button to update
     * @param array{
     *   account: string, label: string
     * }|SocialMediaButtonUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $buttonID,
        array|SocialMediaButtonUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SocialMediaButtonUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'api/%1$s/settings/social-media-buttons/%2$s', $account, $buttonID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: SocialMediaButtonUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the list of social media buttons for the account
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/settings/social-media-buttons', $account],
            options: $requestOptions,
            convert: SocialMediaButtonListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a social media button from the account
     *
     * @param string $buttonID The ID of the social media button to update
     * @param array{account: string}|SocialMediaButtonDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $buttonID,
        array|SocialMediaButtonDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SocialMediaButtonDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'api/%1$s/settings/social-media-buttons/%2$s', $account, $buttonID,
            ],
            options: $options,
            convert: SocialMediaButtonDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Adds a new social media button to the account
     *
     * @param string $account The Account ID
     * @param array{
     *   label: string, type: value-of<Type>, value: string
     * }|SocialMediaButtonAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $account,
        array|SocialMediaButtonAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SocialMediaButtonAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/settings/social-media-buttons', $account],
            body: (object) $parsed,
            options: $options,
            convert: SocialMediaButtonAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Changes the order of social media buttons for the account
     *
     * @param string $account The Account ID
     * @param array{buttonIDs: list<string>}|SocialMediaButtonReorderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SocialMediaButtonReorderResponse>
     *
     * @throws APIException
     */
    public function reorder(
        string $account,
        array|SocialMediaButtonReorderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SocialMediaButtonReorderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/settings/social-media-buttons/reorder', $account],
            body: (object) $parsed,
            options: $options,
            convert: SocialMediaButtonReorderResponse::class,
        );
    }
}
