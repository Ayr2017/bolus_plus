<?php

namespace App\Modules\Event\DataObject;

abstract class EventDataObject implements EventDataInterface
{
    protected array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }
    /**
     * Валидация данных.
     *
     * @return bool
     */
    public function validate(): bool
    {
        return true;
    }

    /**
     * Получить данные.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Трансформация данных перед сохранением.
     *
     * @return array
     */
    public function transform(): array
    {
        return [];
    }

    /**
     * Правила валидации для данных.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Применить кастомную логику (опционально).
     *
     * @return mixed
     */
    public function applyCustomLogic(): mixed
    {
        return null;
    }
}
