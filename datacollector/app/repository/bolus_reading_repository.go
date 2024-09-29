package repository

import (
	"fmt"
	entity "github.com/ayr2017/datacollector/app/entities"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
	"log"
	"os"
)

// BolusReading структура, соответствующая таблице bolus_readings в БД
type BolusReading struct {
	ID           uint         `json:"id"`
	Date         string       `json:"date"`
	DeviceNumber string       `json:"device_number"`
	Rssi         string       `json:"rssi"`
	Ut           float64      `json:"ut"`
	Bolus        entity.Bolus `gorm:"foreignKey:DeviceNumber;references:DeviceNumber" json:"bolus"`
}

// BolusReadingRepository интерфейс для работы с пользователями
type BolusReadingRepository interface {
	GetAllBolusReadings() ([]BolusReading, error)
}

// MySQLUserRepository структура для работы с MySQL
type MySQLBolusReadingRepository struct {
	db *gorm.DB
}

// NewUserRepository создает новый экземпляр репозитория пользователей
func NewBolusReadingRepository() *MySQLBolusReadingRepository {
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

	return &MySQLBolusReadingRepository{db: db}
}

// GetAllUsers возвращает список всех пользователей
func (repo *MySQLBolusReadingRepository) GetAllBolusReadings() ([]BolusReading, error) {
	var bolusReadings []BolusReading
	result := repo.db.Preload("Bolus").Find(&bolusReadings)
	if result.Error != nil {
		return nil, result.Error
	}
	return bolusReadings, nil
}
