package main

import (
// 	"net/http"
    "github.com/ayr2017/datacollector/app/delivery"
    "github.com/ayr2017/datacollector/app/repository"
    "github.com/ayr2017/datacollector/app/usecase"
	"github.com/labstack/echo/v4"
)

func main() {
	e := echo.New()
    repo := repository.NewInMemoryRepository() // Например, в памяти
    uc := usecase.NewUseCase(repo)
    delivery.NewHandler(e, uc)
// 	e.GET("/", func(c echo.Context) error {
// 		return c.String(http.StatusOK, "Hello, World!")
// 	})
//     e.GET("/bolus-readings", func(c echo.Context) error {
//         return c.String(http.StatusOK, "Hello, World!")
//     })
// 	e.File("/stat", "public/index.html")
	e.Logger.Fatal(e.Start(":8080"))
}
