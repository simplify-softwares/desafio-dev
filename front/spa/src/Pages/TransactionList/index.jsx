import React, { useState, useEffect } from 'react';
import { getAllTransactions } from '../../Model/TransactionListModel'

import "../../styles/transaction-list.css";

function TransactionList() {

    const [transactions, setTransactions] = useState();

    useEffect(() => {
        document.title = 'Listagem de Transações | Bycoders';
        (async () => {
            const response = await getAllTransactions();
            setTransactions(response.data)
            console.log(transactions);
        })();      
    })

    return (
        <div className="container transaction">
            <div className="title">
                    <h1>Listagem das transações</h1>
                </div>
                <form action="" className="form">
                    <select name="" id="">
                        <option value="">Selecione uma loja</option>
                    </select>
                </form>
                <table className="table">
                    <thead>
                        <caption></caption>
                        <tr>
                            <th>Tipo</th>
                            <th>Data</th>
                            <th>CPF</th>
                            <th>Cartão</th>
                            <th>Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>fadfa</td>
                            <td>dafadf</td>
                            <td>fadfad</td>
                            <td>fadfadfa</td>
                            <td>fadfad</td>
                        </tr>
                        <tr>
                            <td>fadfa</td>
                            <td>dafadf</td>
                            <td>fadfad</td>
                            <td>fadfadfa</td>
                            <td>fadfad</td>
                        </tr>
                        <tr>
                            <td>fadfa</td>
                            <td>dafadf</td>
                            <td>fadfad</td>
                            <td>fadfadfa</td>
                            <td>fadfad</td>
                        </tr>
                        <tr>
                            <td>fadfa</td>
                            <td>dafadf</td>
                            <td>fadfad</td>
                            <td>fadfadfa</td>
                            <td>fadfad</td>
                        </tr>
                        <tr>
                            <td>fadfa</td>
                            <td>dafadf</td>
                            <td>fadfad</td>
                            <td>fadfadfa</td>
                            <td>fadfad</td>
                        </tr>
                        <tr>
                            <td>fadfa</td>
                            <td>dafadf</td>
                            <td>fadfad</td>
                            <td>fadfadfa</td>
                            <td className="align-right">fadfad</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" className="text-total align-right">Total</td>
                            <td className="price-total align-right">R$ 1132,00</td>
                        </tr>
                    </tfoot>
                </table>
        </div>
    );
}

export default TransactionList;