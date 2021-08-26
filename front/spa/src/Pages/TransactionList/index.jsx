import React, { useState, useEffect } from 'react'
import { getAllTransactions } from '../../Model/TransactionListModel'
import { getAll } from '../../Model/StoreModel'

import '../../styles/transaction-list.css'

function TransactionList () {
  const [transactionsList, setTransactions] = useState([])
  const [store, setStore] = useState('')
  const [total, setTotal] = useState('')
  const [storeId, setStoreId] = useState('')
  const [storeList, setStoreList] = useState([])

  useEffect(() => {
    document.title = 'Listagem de Transações | Bycoders'
    ;(async () => {
      const { data: response } = await getAllTransactions(storeId)
      const { data: responseStore } = await getAll()
      setTransactions(response.data.transactions)
      setStore(response.data.store)
      setTotal(response.data.total)
      setStoreList(responseStore.data.stores)
    })()
  }, [storeId])

  return (
    <div className='container transaction'>
      <div className='title'>
        <h1>Listagem das transações {store && `- ${store.name}`}</h1>
      </div>
      <form action='' className='form'>
        <select
          name='store_id'
          id='store_id'
          value={storeId}
          onChange={e => setStoreId(e.target.value)}
        >
          <option value=''>Selecione uma loja</option>
          {storeList.map(row => (
            <option value={row.id} key={row.id}>
              {row.name}
            </option>
          ))}
        </select>
      </form>
      <table className='table'>
        <thead>
          <tr>
            <th>Tipo</th>
            <th>Data</th>
            <th>CPF</th>
            <th>Cartão</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          {transactionsList.map(row => (
            <tr key={row.id}>
              <td>{row.description}</td>
              <td>{row.transaction_date}</td>
              <td>{row.cpf}</td>
              <td>{row.card}</td>
              <td className='align-right'>{row.price}</td>
            </tr>
          ))}
        </tbody>
        <tfoot>
          <tr>
            <td colSpan='4' className='text-total align-right'>
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
