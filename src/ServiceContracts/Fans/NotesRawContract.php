<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Fans;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Fans\Notes\NoteClearNotesParams;
use Onlyfansapi\Fans\Notes\NoteClearNotesResponse;
use Onlyfansapi\Fans\Notes\NoteCreateEditNotesParams;
use Onlyfansapi\Fans\Notes\NoteGetNotesParams;
use Onlyfansapi\Fans\Notes\NoteGetNotesResponse;
use Onlyfansapi\Fans\Notes\NoteNewEditNotesResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface NotesRawContract
{
    /**
     * @api
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param array<string,mixed>|NoteClearNotesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NoteClearNotesResponse>
     *
     * @throws APIException
     */
    public function clearNotes(
        string $fanID,
        array|NoteClearNotesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param array<string,mixed>|NoteCreateEditNotesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NoteNewEditNotesResponse>
     *
     * @throws APIException
     */
    public function createEditNotes(
        string $fanID,
        array|NoteCreateEditNotesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param array<string,mixed>|NoteGetNotesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NoteGetNotesResponse>
     *
     * @throws APIException
     */
    public function getNotes(
        string $fanID,
        array|NoteGetNotesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
