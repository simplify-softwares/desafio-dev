import React from 'react';

import "../../styles/upload.css"

function Upload() {
    return (
        <div className="container upload">
            <div className="title">
                <h1>Upload de arquivo CNAB</h1>
            </div>
            <form action="" className="form">
                <div className="group-fields">
                    <label htmlFor="">Selecione um arquivo CNAB</label>
                    <input type="file" />
                </div>
                <button className="success">Enviar</button>
                <button className="cancel">Voltar</button>
            </form>
        </div>
    );
}

export default Upload;