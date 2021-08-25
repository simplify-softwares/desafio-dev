import React from 'react';
import { BrowserRouter } from 'react-router-dom';
import Header from "./Components/Header";
import Menu from "./Components/Menu";
import Footer from "./Components/Footer";
import Routes from './routes'

import "./styles/reset.css";
import "./styles/main.css";

const App = () => {
  return (
    <BrowserRouter>
      <div class="container">
        <Header />
        <section>
          <Menu />
          <main>
            <Routes />
          </main>
        </section>
        <Footer />
      </div>
    </BrowserRouter>
  );
}

export default App;
