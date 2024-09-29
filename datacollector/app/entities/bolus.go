package entity

type Bolus struct {
	ID           uint   `json:"id"`
	Number       string `json:"number"`
	Version      string `json:"version"`
	BatchNumber  string `json:"batch_number"`
	DeviceNumber string `json:"device_number"`
	ProducedAt   string `json:"produced_at"`
}

func (Bolus) TableName() string {
	return "boluses"
}
