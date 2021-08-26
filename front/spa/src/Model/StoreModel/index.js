import axios from '../../config/axios'

export const getAll = () => axios.get('/store')