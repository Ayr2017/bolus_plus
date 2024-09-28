package delivery

import (
    "github.com/ayr2017/datacollector/app/usecase"
    "github.com/labstack/echo/v4"
)

type Handler struct {
    uc *usecase.UseCase
}

func NewHandler(e *echo.Echo, uc *usecase.UseCase) {
    h := &Handler{uc: uc}
    e.GET("/endpoint", h.GetData)
}

func (h *Handler) GetData(c echo.Context) error {
    // Используйте h.uc для получения данных
    return c.JSON(200, map[string]string{"message": "Hello from the Go microservice!"})
}
