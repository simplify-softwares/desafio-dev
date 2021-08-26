import React, { useContext } from 'react'
import { Route, Switch, Redirect } from 'react-router-dom'

import Dashboard from '../Pages/Dashboard'
import Upload from '../Pages/Upload'
import TransactionList from '../Pages/TransactionList'
import Login from '../Pages/Login'

import { Context } from "../Context/AuthContext";

function CustomRoute({ isPrivate, ...rest }) {
  const { loading, authenticated } = useContext(Context);

  if (loading) {
    return (<></>);
  }

  if (isPrivate && !authenticated) {
    return <Redirect to="/login" />
  }

  return <Route {...rest} />;
}

const Routes = () => {
  return (
    <Switch>
      <CustomRoute path='/login' exact component={Login} />
      <CustomRoute isPrivate path='/' exact component={Dashboard} />
      <CustomRoute isPrivate path='/upload' component={Upload} />
      <CustomRoute isPrivate path='/transactions' component={TransactionList} />
    </Switch>
  )
}

export default Routes
