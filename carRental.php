<?php

class CarRental {
    private DateTime $pickupDate;
    private DateTime $returnDate;
    private float $pricePerDay;

    public function __construct(string $pickupDate, string $returnDate, float $pricePerDay) {
        $this->pickupDate = new DateTime($pickupDate);
        $this->returnDate = new DateTime($returnDate);
        $this->pricePerDay = $pricePerDay;
    }

    public function getDays(): int {
        $diff = $this->returnDate->diff($this->pickupDate);
        $days = (int)$diff->days;
        
  
        if ($this->returnDate < $this->pickupDate) {
            return 0;
        }
        return $days;
    }

   
    public function getTotalPrice(): float {
        return $this->getDays() * $this->pricePerDay;
    }

   
    public function isOverdue(): bool {
        $now = new DateTime();
        return $now > $this->returnDate;
    }
}
