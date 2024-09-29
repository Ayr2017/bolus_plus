package usecase

import (
    "github.com/ayr2017/datacollector/app/repository"
    "log"
)

type UserUseCase struct {
    userRepo repository.UserRepository
}

// NewUserUseCase создает новый экземпляр use case
func NewUserUseCase(repo repository.UserRepository) *UserUseCase {
    return &UserUseCase{userRepo: repo}
}

// GetAllUsers получает всех пользователей
func (uc *UserUseCase) GetAllUsers() ([]repository.User, error) {
    users, err := uc.userRepo.GetAllUsers()
    if err != nil {
        log.Fatalf("Ошибка при получении пользователей: %v", err)
    }

    for _, user := range users {
        log.Printf("ID: %d, Name: %s, Email: %s\n", user.ID, user.Name, user.Email)
    }
    return users, nil
}
