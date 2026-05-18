<?php

class Delivery {
    private DateTime $createdAt;
    private DateTime $estimatedAt;
    private ?DateTime $deliveredAt;

    public function __construct(string $createdAt, string $estimatedAt, ?string $deliveredAt = null) {
        $this->createdAt = new DateTime($createdAt);
        $this->estimatedAt = new DateTime($estimatedAt);
        $this->deliveredAt = $deliveredAt ? new DateTime($deliveredAt) : null;
    }

 
    public function isLate(): bool {
        $endTime = $this->deliveredAt ?? new DateTime();
        return $endTime > $this->estimatedAt;
    }


    public function getDelayMinutes(): int {
        if (!$this->isLate()) {
            return 0;
        }
        $endTime = $this->deliveredAt ?? new DateTime();
        $diff = $endTime->diff($this->estimatedAt);
        
       
        return ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;
    }

 
    public function getDeliveryTime(): ?int {
        if (!$this->deliveredAt) {
            return null; // Еще не доставлено
        }
        $diff = $this->deliveredAt->diff($this->createdAt);
        return ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;
    }
}
