<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Posts;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Posts\Labels\LabelListResponse;
use OnlyFansAPI\Posts\Labels\LabelNewResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Posts\LabelsContract;

/**
 * APIs for managing your post labels.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class LabelsService implements LabelsContract
{
    /**
     * @api
     */
    public LabelsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LabelsRawService($client);
    }

    /**
     * @api
     *
     * Create a new post label.
     *
     * @param string $account The Account ID
     * @param string $name The name of your new label
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): LabelNewResponse {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the labels that you can use to organize your posts.
     *
     * @param string $account The Account ID
     * @param string $limit Number of labels to return (default = 10)
     * @param string $offset Number of labels to skip for pagination
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?string $limit = null,
        ?string $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): LabelListResponse {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
