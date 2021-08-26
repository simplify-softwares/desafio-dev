import React, { useContext } from 'react';
import { Link } from 'react-router-dom';

import { Context } from "../../Context/AuthContext"

function Menu () {
    const { handleLogout } = useContext(Context);

    return (
        <nav>
            <ul id="main-menu">
                <li className="active">
                    <Link to="/">Home</Link>
                </li>
                <li>
                    <Link to="/upload">Enviar arquivo CNAB</Link>
                </li>
                <li>
                    <Link to="/transactions">Listar Transações</Link>
                </li>
                <li>
                    <Link to="" id="link_logout" onClick={handleLogout}>Sair</Link>
                </li>
            </ul>
        </nav>
    )
}

export default Menu;