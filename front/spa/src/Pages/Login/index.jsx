import React, { useContext, useState } from 'react';

import { Context } from "../../Context/AuthContext"

import "../../styles/login.css";

function Login() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");

    const { handleLogin } = useContext(Context);

    function Login() {

        if (email === "" || password === "") {
            alert("Todos os campos são obrigatórios!")
            return;
        }

        handleLogin(email, password)
    }

    return (
        <div className="container login">
            <form action="" className="form">
                <h1>Identifique-se</h1>
                <p>Para acessar o sistema, informe suas credencias de acesso!</p>
                <div className="group-fields">
                    <label htmlFor="username">E-mail</label>
                    <input type="email" name="username" id="username" value={email}
                                onChange={e => setEmail(e.target.value)} />
                </div>
                <div className="group-fields">
                    <label htmlFor="username">Password</label>
                    <input type="password" name="password" id="password" value={password}
                                onChange={e => setPassword(e.target.value)} />
                </div>
                <button className="success" type="button" onClick={Login}>Logar</button>
            </form>
        </div>
    );
}

export default Login;