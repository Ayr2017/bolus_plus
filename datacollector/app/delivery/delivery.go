package delivery

import (
	"github.com/ayr2017/datacollector/app/usecase"
	"github.com/labstack/echo/v4"
)

type Handler struct {
	uc *usecase.BolusReadingUseCase
}

func NewHandler(e *echo.Echo, uc *usecase.BolusReadingUseCase) {
	h := &Handler{uc: uc}
	e.GET("/endpoint", h.GetData)
}

func (h *Handler) GetData(c echo.Context) error {
	data, err := h.uc.GetAllBolusReadings()
	if err != nil {
		return err
	}
	// Используйте h.uc для получения данных

	return c.JSON(200, data)
}
