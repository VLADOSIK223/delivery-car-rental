class CarRental {
    constructor(pickupDate, returnDate, pricePerDay) {
        this.pickupDate = new Date(pickupDate);
        this.returnDate = new Date(returnDate);
        this.pricePerDay = pricePerDay;
    }

  
    getDays() {
        const diffMs = this.returnDate - this.pickupDate;
        const days = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
        return days < 0 ? 0 : days;
    }

    getTotalPrice() {
        return this.getDays() * this.pricePerDay;
    }

    isOverdue() {
        const now = new Date();
        return now > this.returnDate;
    }
}
