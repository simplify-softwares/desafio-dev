import React, { useEffect, useState } from 'react'
import { UploadFile } from '../../Model/Transaction'
import '../../styles/upload.css'

function Upload () {
  const [uploadedFile, setUploadedFile] = useState('')

  useEffect(() => {
    document.title = 'Upload de arquivo CNAB | Bycoders'
  }, [])

  const changeFileUpload = event => {
    const file = event.target.files[0]

    if (file.type !== 'text/plain') {
      alert('Precisa ser um arquivo de texto')
      return
    }

    setUploadedFile(file)
  }

  const doUpload = async () => {
    const formData = new FormData()
    formData.append('file', uploadedFile)
    const { data: response } = await UploadFile(formData)

    if (response.status !== 'success') {
      alert('Ocorreu algum erro ao enviar arquivo!')
      return
    }

    alert(
      `${response.data.title} Em um total de ${response.data.total} registros!`
    )
  }

  return (
    <div className='container upload'>
      <div className='title'>
        <h1>Upload de arquivo CNAB</h1>
      </div>
      <form className='form'>
        <div className='group-fields'>
          <label htmlFor=''>Selecione um arquivo CNAB</label>
          <input type='file' name='file' onChange={changeFileUpload} />
        </div>
        <button className='success' type='button' onClick={doUpload}>
          Enviar
        </button>
      </form>
    </div>
  )
}

export default Upload
