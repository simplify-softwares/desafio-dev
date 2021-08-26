import axios from '../config/axios'

const token = localStorage.getItem('token')
axios.defaults.headers.Authorization = null
if (token) {
  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
}
