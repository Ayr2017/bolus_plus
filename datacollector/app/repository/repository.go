package repository

type Repository interface {
    GetAll() ([]interface{}, error)
}
//
// type InMemoryRepository struct {
//     // Ваша структура для хранения данных в памяти
// }
//
// func NewInMemoryRepository() *InMemoryRepository {
//     return &InMemoryRepository{}
// }
//
// // Реализуйте методы доступа к данным
