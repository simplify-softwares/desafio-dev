import React, { useContext } from 'react';
import Header from "../Header";
import Menu from "../Menu";
import Footer from "../Footer";
import Login from "../../Pages/Login"

import Routes from '../../routes'

import { Context } from "../../Context/AuthContext"

import "../../styles/reset.css";
import "../../styles/main.css";

function Application() {
    const { authenticated } = useContext(Context);
    
    if (!authenticated) {
        return <Login />;
    }

    return (
        <>
        <Header />
        <section>
            <Menu />
            <main>
            <Routes />
            </main>
        </section>
        <Footer />
        </>
    )
}

export default Application;