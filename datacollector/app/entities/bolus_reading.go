package entity

type BolusReading struct {
	ID             uint
	Date           string
	DeliveryNumber string
	Rssi           float64
	Ut             float64
}
