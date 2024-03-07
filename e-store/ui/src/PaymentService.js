// PaymentService.js

import axios from "axios";

const API_URL = "http://your-laravel-api-url/api/";

export default {
    async processPayment(paymentData) {
        try {
            const response = await axios.post(
                API_URL + "process-payment",
                paymentData
            );
            return response.data;
        } catch (error) {
            throw new Error("Failed to process payment");
        }
    },
};
