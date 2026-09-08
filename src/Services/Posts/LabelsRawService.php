<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Posts;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Posts\Labels\LabelCreateParams;
use OnlyFansAPI\Posts\Labels\LabelListParams;
use OnlyFansAPI\Posts\Labels\LabelListResponse;
use OnlyFansAPI\Posts\Labels\LabelNewResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Posts\LabelsRawContract;

/**
 * APIs for managing your post labels.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class LabelsRawService implements LabelsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new post label.
     *
     * @param string $account The Account ID
     * @param array{name: string}|LabelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|LabelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LabelCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/posts/labels', $account],
            body: (object) $parsed,
            options: $options,
            convert: LabelNewResponse::class,
        );
    }

    /**
     * @api
     *
     * List the labels that you can use to organize your posts.
     *
     * @param string $account The Account ID
     * @param array{limit?: string, offset?: string}|LabelListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|LabelListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LabelListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/posts/labels', $account],
            query: $parsed,
            options: $options,
            convert: LabelListResponse::class,
        );
    }
}
