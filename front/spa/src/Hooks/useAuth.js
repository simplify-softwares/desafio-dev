import { useState, useEffect } from 'react'

import axios from '../config/axios'
import history from '../config/history'

import { doLogin } from '../Model/Login'

export default function useAuth () {
  const [authenticated, setAuthenticated] = useState(false)
  const [loading, setLoading] = useState(true)

  useEffect(() => {
    const token = localStorage.getItem('token')
    
    if (token) {
      axios.defaults.headers.Authorization = `Bearer ${token}`
      setAuthenticated(true)
    }

    setLoading(false)
  }, [])

  async function handleLogin (email, senha) {
    const { data: response } = await doLogin(email, senha)

    if (response.status === 'fail') {
      alert(response.data.title)
      setAuthenticated(false)
      return
    }

    const token = response.data.token
    const user = response.data.user
    localStorage.setItem('token', JSON.stringify(token).replace("\"", ""))
    localStorage.setItem('user', JSON.stringify(user))
    axios.defaults.headers.Authorization = `Bearer ${token}`
    setAuthenticated(true)
    history.push('/')
  }

  function handleLogout () {
    setAuthenticated(false)
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    axios.defaults.headers.Authorization = undefined
    history.push('/login')
  }

  return { authenticated, loading, handleLogin, handleLogout }
}
