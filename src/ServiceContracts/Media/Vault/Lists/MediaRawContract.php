<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Media\Vault\Lists;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Media\Vault\Lists\Media\MediaAddParams;
use OnlyFansAPI\Media\Vault\Lists\Media\MediaAddResponse;
use OnlyFansAPI\Media\Vault\Lists\Media\MediaRemoveParams;
use OnlyFansAPI\Media\Vault\Lists\Media\MediaRemoveResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
