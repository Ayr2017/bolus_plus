package usecase

import "github.com/ayr2017/datacollector/app/repository"

type UseCase struct {
    repo repository.Repository
}

func NewUseCase(r repository.Repository) *UseCase {
    return &UseCase{repo: r}
}
