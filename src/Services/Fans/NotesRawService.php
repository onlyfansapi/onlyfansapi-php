<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Fans;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Fans\Notes\NoteClearNotesParams;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse;
use OnlyFansAPI\Fans\Notes\NoteCreateEditNotesParams;
use OnlyFansAPI\Fans\Notes\NoteGetNotesParams;
use OnlyFansAPI\Fans\Notes\NoteGetNotesResponse;
use OnlyFansAPI\Fans\Notes\NoteNewEditNotesResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Fans\NotesRawContract;

/**
 * APIs for managing OnlyFans fans (subscribers).
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class NotesRawService implements NotesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Clear notes for a specific fan.
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param array{account: string}|NoteClearNotesParams $params
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
    ): BaseResponse {
        [$parsed, $options] = NoteClearNotesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/fans/%2$s/notes', $account, $fanID],
            options: $options,
            convert: NoteClearNotesResponse::class,
        );
    }

    /**
     * @api
     *
     * Create or edit notes for a specific fan.
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param array{account: string, notes: string}|NoteCreateEditNotesParams $params
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
    ): BaseResponse {
        [$parsed, $options] = NoteCreateEditNotesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/fans/%2$s/notes', $account, $fanID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: NoteNewEditNotesResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve notes for a specific fan.
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param array{account: string}|NoteGetNotesParams $params
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
    ): BaseResponse {
        [$parsed, $options] = NoteGetNotesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/fans/%2$s/notes', $account, $fanID],
            options: $options,
            convert: NoteGetNotesResponse::class,
        );
    }
}
