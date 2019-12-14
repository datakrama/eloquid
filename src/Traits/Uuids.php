<?php

namespace Datakrama\Eloquid\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\Pivot;

trait Uuids
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function bootUuids()
    {
        static::creating(function ($model) {
            if ( ! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
        if (new self() instanceof Pivot) {
            Pivot::creating(function($pivot) {
                $pivot->{$model->getKeyName()} = (string) Str::uuid();
            });
        }
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table ?? Str::snake(Str::pluralStudly(class_basename($this)));
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}