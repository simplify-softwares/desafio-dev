import React, { useEffect, useState } from 'react';

function Header () {

    const [user, setUser] = useState(null)

    useEffect(() => {
        const userStorage = localStorage.getItem("user")
        setUser(JSON.parse(userStorage));        
    }, [])

    return (
        <header>
            <p id="welcome-message">Bem vindo, <strong>{user?.name}</strong></p>
        </header>
    )
}

export default Header;