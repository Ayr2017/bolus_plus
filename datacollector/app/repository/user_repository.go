package repository

import (
    "gorm.io/gorm"
    "gorm.io/driver/mysql"
    "log"
    "fmt"
    "os"
)

// User структура, соответствующая таблице users в БД
type User struct {
    ID       uint   `json:"id"`
    Name     string `json:"name"`
    Email    string `json:"email"`
    Password string `json:"-"`
}

// UserRepository интерфейс для работы с пользователями
type UserRepository interface {
    GetAllUsers() ([]User, error)
}

// MySQLUserRepository структура для работы с MySQL
type MySQLUserRepository struct {
    db *gorm.DB
}

// NewUserRepository создает новый экземпляр репозитория пользователей
func NewUserRepository() *MySQLUserRepository {
    dbUser := os.Getenv("DB_USERNAME")
    dbPass := os.Getenv("DB_PASSWORD")
    dbHost := os.Getenv("DB_HOST")
    dbPort := os.Getenv("DB_PORT")
    dbName := os.Getenv("DB_DATABASE")
    dsn := fmt.Sprintf("%s:%s@tcp(%s:%s)/%s?charset=utf8mb4&parseTime=True&loc=Local", dbUser, dbPass, dbHost, dbPort, dbName)
    db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
    if err != nil {
        log.Fatalf("Не удалось подключиться к базе данных: %v", err)
    }

    return &MySQLUserRepository{db: db}
}

// GetAllUsers возвращает список всех пользователей
func (repo *MySQLUserRepository) GetAllUsers() ([]User, error) {
    var users []User
    result := repo.db.Find(&users)
    if result.Error != nil {
        return nil, result.Error
    }
    return users, nil
}
