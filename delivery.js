class Delivery {
    constructor(createdAt, estimatedAt, deliveredAt = null) {
        this.createdAt = new Date(createdAt);
        this.estimatedAt = new Date(estimatedAt);
        this.deliveredAt = deliveredAt ? new Date(deliveredAt) : null;
    }

    isLate() {
        const endTime = this.deliveredAt ? this.deliveredAt : new Date();
        return endTime > this.estimatedAt;
    }

  
    getDelayMinutes() {
        if (!this.isLate()) return 0;
        const endTime = this.deliveredAt ? this.deliveredAt : new Date();
        const diffMs = endTime - this.estimatedAt;
        return Math.floor(diffMs / 1000 / 60);
    }


    getDeliveryTime() {
        if (!this.deliveredAt) return null; 
        const diffMs = this.deliveredAt - this.createdAt;
        return Math.floor(diffMs / 1000 / 60);
    }
}
