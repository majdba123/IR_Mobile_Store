import { loadStripe } from "@stripe/stripe-js";

export async function getStripe() {
    const stripe = await loadStripe(process.env.VUE_APP_STRIPE_PUBLISHABLE_KEY);
    return stripe;
}
