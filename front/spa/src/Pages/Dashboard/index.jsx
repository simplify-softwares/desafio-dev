import React, { useEffect, useState } from 'react';


function Home() {
    const [user, setUser] = useState(null)

    useEffect(() => {
        const userStorage = localStorage.getItem("user")
        setUser(JSON.parse(userStorage));        
    }, [])


    return (
        <div className="container dashboard">
            <div className="title">
                <h1>Bem vindo, {user?.name}</h1>
            </div>
        </div>
    );
}

export default Home;