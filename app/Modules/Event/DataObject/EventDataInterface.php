<?php

namespace App\Modules\Event\DataObject;
use Illuminate\Support\Collection;

interface EventDataInterface
{
    /**
     * Валидация данных.
     *
     * @return bool
     */
    public function validate(): bool;

    /**
     * Получить данные.
     *
     * @return array
     */
    public function getData(): array;

    /**
     * Трансформация данных перед сохранением.
     *
     * @return array
     */
    public function transform(): array;

    /**
     * Правила валидации для данных.
     *
     * @return array
     */
    public function rules(): array;

    /**
     * Применить кастомную логику (опционально).
     *
     * @return mixed
     */
    public function applyCustomLogic(): mixed;
    /**
     * Применить кастомную логику (опционально).
     *
     * @return mixed
     */
    public function fields(): Collection;
    public function dataArray(): array;
}
