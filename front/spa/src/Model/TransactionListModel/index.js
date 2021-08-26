import axios from '../../config/axios'

export const getAllTransactions = store_id => {
  let url = '/transaction'
  if (store_id !== '') {
    url = `${url}/store/${store_id}`
  }

  return axios.get(url)
}
