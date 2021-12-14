<?php

namespace app\Auth;

use Illuminate\Auth\EloquentUserProvider;

class CustomEloquentUserProvider extends EloquentUserProvider
{
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        $model = $this->createModel();
        $columns = $model->getAuthIdentifierName();

        $col1 = $columns[0];
        $col2 = $columns[1];

        $primarykey = explode('|', $identifier);

        return $this->newModelQuery($model)
                    ->whereRaw($col1 . ' = ? and ' . $col2 .' = ?', $primarykey)
                    ->first();
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        $model = $this->createModel();
        $columns = $model->getAuthIdentifierName();

        $col1 = $columns[0];
        $col2 = $columns[1];

        $primarykey = explode('|', $identifier);

        $retrievedModel = $this->newModelQuery($model)
                               ->whereRaw($col1 . ' = ? and ' . $col2 .' = ?', $primarykey)
                               ->first();

        if (! $retrievedModel) {
            return;
        }

        $rememberToken = $retrievedModel->getRememberToken();

        return $rememberToken && hash_equals($rememberToken, $token)
                        ? $retrievedModel : null;
    }
}
