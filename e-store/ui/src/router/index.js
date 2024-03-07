import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import help from "../views/Help.vue";
import SignUp from "../views/SignUp.vue";
import AllCategories from "../views/AllCategories";
import ForgotPassword from "../views/ForgotPassword";
import RePassword from "../views/RePassword";
import UserAccount from "../views/UserAccount";
import ProfileView from "../views/ProfileView";
import DetailsProduct from "../views/DetailsProduct";
import CheckOut from "../views/CheckOut";
import ComPare from "../views/Compare";
import ComPany from "../views/Company";
import CompanyAdmin from "../views/CompanyAdmin";
import LatestProduct from "../views/LatestProduct";
import Admin from "../views/Admin";
import OfferProduct from "../views/OfferProduct";
import AddProduct from "../views/AddProduct";
import CategoryPage from "../views/CategoryPage";
import AddCategory from "../views/AddCategory";
import UsersAdmin from "../views/UsersAdmin";
import AddCobon from "../views/AddCobon";
import AddOffer from "../views/AddOffer";
import TableOfMessage from "../views/TableOfMessage";
import ContactUs from "../views/ContactUs";
import FaQ from "../views/FAQ";
import AnotherWeb from "../views/AnotherWeb";
import OrderAdmin from "../views/OrderAdmin";
import PayMent from "../views/Payment";

const routes = [
    {
        path: "/PayMent",
        name: "PayMent",
        component: PayMent,
    },
    {
        path: "/OrderAdmin",
        name: "OrderAdmin",
        component: OrderAdmin,
    },
    {
        path: "/AnotherWeb",
        name: "AnotherWeb",
        component: AnotherWeb,
    },
    {
        path: "/FaQ",
        name: "FaQ",
        component: FaQ,
    },
    {
        path: "/ContactUs",
        name: "ContactUs",
        component: ContactUs,
    },
    {
        path: "/TableOfMessage",
        name: "TableOfMessage",
        component: TableOfMessage,
    },
    {
        path: "/AddOffer",
        name: "AddOffer",
        component: AddOffer,
    },
    {
        path: "/AddCobon",
        name: "AddCobon",
        component: AddCobon,
    },
    {
        path: "/UsersAdmin",
        name: "UsersAdmin",
        component: UsersAdmin,
    },
    {
        path: "/AddCategory",
        name: "AddCategory",
        component: AddCategory,
    },

    {
        path: "/AddProduct",
        name: "AddProduct",
        component: AddProduct,
    },

    {
        path: "/OfferProduct",
        name: "OfferProduct",
        component: OfferProduct,
    },
    {
        path: "/AdmIn",
        name: "AdmIn",
        component: Admin,
    },
    {
        path: "/LatestProduct",
        name: "LatestProduct",
        component: LatestProduct,
    },
    {
        path: "/CompanyAdmin",
        name: "CompanyAdmin",
        component: CompanyAdmin,
    },

    {
        path: "/Company",
        name: "Company",
        component: ComPany,
    },
    {
        path: "/Compare",
        name: "Compare",
        component: ComPare,
    },
    {
        path: "/CheckOut",
        name: "CheckOut",
        component: CheckOut,
    },
    {
        path: "/DetailsProduct",
        name: "DetailsProduct",
        component: DetailsProduct,
    },
    {
        path: "/ProfileView",
        name: "ProfileView",
        component: ProfileView,
    },
    {
        path: "/UserAccount",
        name: "UserAccount",
        component: UserAccount,
    },
    {
        path: "/RePassword",
        name: "Repassword",
        component: RePassword,
    },
    {
        path: "/ForgotPassword",
        name: "ForgotPassword",
        component: ForgotPassword,
    },
    {
        path: "/",
        name: "home",
        component: HomeView,
    },
    {
        path: "/AllCategories",
        name: "AllCategories",
        component: AllCategories,
    },
    {
        path: "/about",
        name: "about",
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
    },
    {
        path: "/help",
        name: "help",
        component: help,
    },
    {
        path: "/SignUp",
        name: "SignUp",
        component: SignUp,
    },
    {
        path: "/CategoryPage",
        name: "CategoryPage",
        component: CategoryPage,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
