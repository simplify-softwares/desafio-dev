import axios from '../../config/axios';

export const getAllTransactions = () => axios.get('/transaction');
export const getAllTransactionsByStore = (store_id) => axios.get(`/transaction/store/${store_id}`);