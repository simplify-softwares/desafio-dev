import React from 'react';
import { Router } from 'react-router-dom';
import Application from './Components/Application'

import history from './config/history'

import { AuthProvider } from "./Context/AuthContext"

function App() {
  return (
    <AuthProvider>
      <Router history={history}>
          <Application />
      </Router>
    </AuthProvider>
  );
}

export default App;
