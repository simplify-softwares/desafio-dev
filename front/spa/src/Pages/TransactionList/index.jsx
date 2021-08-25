import React from 'react';

import "../../styles/transaction-list.css";

function TransactionList() {
    return (
        <>
            <div class="title">
                    <h1>Listagem das transações</h1>
                </div>
                <form action="" class="form">
                    <select name="" id="">
                        <option value="">Selecione uma loja</option>
                    </select>
                </form>
                <table class="table">
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
                            <td class="align-right">fadfad</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-total align-right">Total</td>
                            <td class="price-total align-right">R$ 1132,00</td>
                        </tr>
                    </tfoot>
                </table>
        </>
    );
}

export default TransactionList;