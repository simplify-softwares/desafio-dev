import axios from "../../config/axios"

export const doLogin = (email, password) => axios.post('/login', {email, password})