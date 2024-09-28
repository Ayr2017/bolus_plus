package repository

type Repository interface {
    // Определите методы доступа к данным здесь
}

type InMemoryRepository struct {
    // Ваша структура для хранения данных в памяти
}

func NewInMemoryRepository() *InMemoryRepository {
    return &InMemoryRepository{}
}

// Реализуйте методы доступа к данным
