import axios from '../../config/axios'

export const UploadFile = file => axios.post('/transaction', file)
