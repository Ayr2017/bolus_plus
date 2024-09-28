# Используем базовый образ Golang
FROM golang:1.23-alpine AS builder


# Устанавливаем рабочую директорию
WORKDIR /go/src/app

# Копируем файлы go модуля
COPY go.mod .
COPY go.sum .


# Скачиваем зависимости
RUN go mod download

# Копируем исходный код проекта
COPY . .

# Сборка приложения
RUN go build -o /go/bin/app


# Второй этап сборки образа
FROM alpine

# Копируем исполняемый файл из builder-этапа
COPY app/public/ public/

COPY --from=builder /go/bin/app /usr/local/bin/app
COPY --from=builder /go/src/app/app/public /app/public

# Определяем команду для запуска приложения
CMD ["app"]
