import React, { useState, useEffect } from 'react'
import { getAllTransactions } from '../../Model/TransactionListModel'

import '../../styles/transaction-list.css'

function TransactionList () {
  const [transactionsList, setTransactions] = useState([])
  const [store, setStore] = useState([])
  const [total, setTotal] = useState([])

  useEffect(() => {
    document.title = 'Listagem de Transações | Bycoders';
    
    (async () => {
      const { data: response } = await getAllTransactions()
      setTransactions(response.data.transactions)
      setStore(response.data.store)
      setTotal(response.data.total)
    })()
  }, [])

  console.debug("TRANSACTIONS", transactionsList)

  return (
    <div className='container transaction'>
      <div className='title'>
        <h1>Listagem das transações</h1>
      </div>
      <form action='' className='form'>
        <select name='' id=''>
          <option value=''>Selecione uma loja</option>
        </select>
      </form>
      <table className='table'>
        <thead>
          <caption></caption>
          <tr>
            <th>Tipo</th>
            <th>Data</th>
            <th>CPF</th>
            <th>Cartão</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          {transactionsList.map((row) => (
            <tr key={row.id}>
              <td>{row.description}</td>
              <td>{row.transaction_date}</td>
              <td>{row.cpf}</td>
              <td>{row.card}</td>
              <td className="align-right">{row.price}</td>
            </tr>
          ))}
        </tbody>
        <tfoot>
          <tr>
            <td colspan='4' className='text-total align-right'>
              Total
            </td>
            <td className='price-total align-right'>{total}</td>
          </tr>
        </tfoot>
      </table>
    </div>
  )
}

export default TransactionList
