package usecase

import (
    "github.com/ayr2017/datacollector/app/repository"
    "log"
)

type BolusReadingUseCase struct {
    brRepo repository.BolusReadingRepository
}

// NewUserUseCase создает новый экземпляр use case
func NewBolusReadingUseCase(repo repository.BolusReadingRepository) *BolusReadingUseCase {
    return &BolusReadingUseCase{brRepo: repo}
}

// GetAll получает всех пользователей
func (uc *BolusReadingUseCase) GetAllBolusReadings() ([]repository.BolusReading, error) {
    bolusReadings, err := uc.brRepo.GetAllBolusReadings()
    if err != nil {
        log.Fatalf("Ошибка при получении пользователей: %v", err)
    }

    return bolusReadings, nil
}
