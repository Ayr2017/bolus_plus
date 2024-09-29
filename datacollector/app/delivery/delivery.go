package delivery

import (
    "github.com/ayr2017/datacollector/app/usecase"
    "github.com/labstack/echo/v4"
)

type Handler struct {
    uc *usecase.UserUseCase
}

func NewHandler(e *echo.Echo, uc *usecase.UserUseCase) {
    h := &Handler{uc: uc}
    e.GET("/endpoint", h.GetData)
}

func (h *Handler) GetData(c echo.Context) error {
    users, err := h.uc.GetAllUsers()
    if err != nil {
        return err
    }
    // Используйте h.uc для получения данных
    return c.JSON(200, users)
}
