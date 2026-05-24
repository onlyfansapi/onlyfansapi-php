<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Media\Vault\Lists;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Vault\Lists\Media\MediaAddParams;
use Onlyfansapi\Media\Vault\Lists\Media\MediaAddResponse;
use Onlyfansapi\Media\Vault\Lists\Media\MediaRemoveParams;
use Onlyfansapi\Media\Vault\Lists\Media\MediaRemoveResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface MediaRawContract
{
    /**
     * @api
     *
     * @param string $listID path param: The ID of the list
     * @param array<string,mixed>|MediaAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        array|MediaAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID path param: The ID of the list
     * @param array<string,mixed>|MediaRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $listID,
        array|MediaRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
