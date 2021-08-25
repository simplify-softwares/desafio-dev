import React from 'react';
import { Link } from 'react-router-dom';

function Menu () {
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
                    <Link to="/logout" id="link_logout">Sair</Link>
                </li>
            </ul>
        </nav>
    )
}

export default Menu;