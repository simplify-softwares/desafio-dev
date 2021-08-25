import React from 'react';

import "../../styles/upload.css"

function Upload() {
    return (
        <>
            <div className="title">
                <h1>Upload de arquivo CNAB</h1>
            </div>
            <form action="" className="form">
                <div className="group-fields">
                    <label for="">Selecione um arquivo CNAB</label>
                    <input type="file" />
                </div>
                <button className="success">Enviar</button>
                <button className="cancel">Voltar</button>
            </form>
        </>
    );
}

export default Upload;