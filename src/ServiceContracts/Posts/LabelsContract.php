<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Posts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Posts\Labels\LabelListResponse;
use Onlyfansapi\Posts\Labels\LabelNewResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
