<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Posts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Posts\Labels\LabelListResponse;
use OnlyFansAPI\Posts\Labels\LabelNewResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface LabelsContract
{
    /**
     * @api
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
    ): LabelNewResponse;

    /**
     * @api
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
    ): LabelListResponse;
}
