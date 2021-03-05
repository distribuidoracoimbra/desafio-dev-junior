import React from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom'

import Home from './pages/Home'
import Gestao_de_Contrato from './pages/Gestao_de_Contrato'
import Modale from './components/Modal'

const Router = () => {
    return (
        <BrowserRouter>
            <Switch>
                <Route path="/" exact component={Home} />
                <Route path="/emprestimos" component={Gestao_de_Contrato} />
                <Route path="/Modale/:id" component={Modale} />
            </Switch>
        </BrowserRouter>
    )
}

export default Router