package main

import (
    "github.com/ayr2017/datacollector/app/delivery"
    "github.com/ayr2017/datacollector/app/repository"
    "github.com/ayr2017/datacollector/app/usecase"
	"github.com/labstack/echo/v4"
)

func main() {
	e := echo.New()
//     repo := repository.NewInMemoryRepository() // Например, в памяти
//     uc := usecase.NewUseCase(repo)

    userRepo := repository.NewUserRepository()
    userUseCase := usecase.NewUserUseCase(userRepo)

//     delivery.NewHandler(e, uc)
    delivery.NewHandler(e, userUseCase)
	e.Logger.Fatal(e.Start(":8080"))
}
