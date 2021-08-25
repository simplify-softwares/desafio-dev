import React from 'react';
import { Route, Switch, Redirect } from 'react-router-dom';

import Dashboard from '../Pages/Dashboard';
import Upload from '../Pages/Upload';
import TransactionList from '../Pages/TransactionList';

const Routes = () => {
    return (
        <Switch>
            <Route path="/" exact component={Dashboard} />
            <Route path="/upload" component={Upload} />
            <Route path="/transactions" component={TransactionList} />
        </Switch>
    );
}

export default Routes;